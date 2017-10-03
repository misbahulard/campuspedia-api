<?php

namespace App\Http\Controllers;

use App\Campus;
use App\CampusLocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CampusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $campuses = Campus::paginate(5);
        return view('campuses/index', compact('campuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('campuses/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'web' => 'required',
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required'
        ]);

        $location = new CampusLocation;
        $location->street_address = $request->street_address;
        $location->postal_code = $request->postal_code;
        $location->city = $request->city;
        $location->state_province = $request->state_province;
        $location->latitude = $request->latitude;
        $location->longtitude = $request->longtitude;
        $location->save();

        $campus = new Campus;
        $campus->campus_location_id = $location->campus_location_id;
        $campus->name = $request->name;
        $campus->web = $request->web;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img/campuses');
            $image->move($destinationPath, $name);
            $campus->logo = $name;
        } else {
            $campus->logo = 'default.jpg';
        }

        $campus->save();
        return redirect('campuses')->with('status', 'New campus has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $campus = Campus::find($id);
        return view('campuses/edit', compact('campus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'web' => 'required',
            'logo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required',
            'latitude' => 'required',
            'longtitude' => 'required'
        ]);

        $campus = Campus::find($id);
        $location = CampusLocation::find($campus->campus_location_id);

        $location->street_address = $request->street_address;
        $location->postal_code = $request->postal_code;
        $location->city = $request->city;
        $location->state_province = $request->state_province;
        $location->latitude = $request->latitude;
        $location->longtitude = $request->longtitude;
        $location->save();

        $campus->campus_location_id = $location->campus_location_id;
        $campus->name = $request->name;
        $campus->web = $request->web;

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img/campuses');
            if ($campus->logo != 'default.jpg') {
                File::delete($destinationPath . '/' . $campus->logo);
            }
            $image->move($destinationPath, $name);
            $campus->logo = $name;
        }

        $campus->save();
        return redirect('campuses')->with('status', 'campus has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $campus = Campus::find($id);
        $location = CampusLocation::find($campus->campus_location_id);
        $campus->delete();
        $location->delete();
        return redirect('campuses')->with('status', 'Delete success!');
    }
}
