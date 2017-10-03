<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Event;
use App\EventCategory;
use App\EventLocation;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(5);
        return view('/events/index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventCategory::all();
        $campuses = Campus::all();
        return view('/events/create', compact(['categories', 'campuses']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'event_date' => 'required',
            'description' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'street_address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'state_province' => 'required'
        ]);

        $location = new EventLocation;
        $location->street_address = $request->street_address;
        $location->postal_code = $request->postal_code;
        $location->city = $request->city;
        $location->state_province = $request->state_province;
        $location->latitude = $request->latitude;
        $location->longtitude = $request->longtitude;
        $location->save();

        $event = new Event;
        $event->category_id = $request->category_id;
        $event->event_location_id = $location->event_location_id;
        $event->campus_id = $request->campus_id;
        $event->name = $request->name;
        $event->event_date = $request->event_date;
        $event->description = $request->description;
        $event->status = 1;

        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img/events');
            $image->move($destinationPath, $name);
            $event->photo = $name;
        } else {
            $event->logo = 'default.jpg';
        }

        $event->save();
        return redirect('event')->with('status', 'New event has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
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
        $categories = EventCategory::all();
        $campuses = Campus::all();
        $event = Event::find($id);
        return view('/events/edit', compact(['event', 'categories', 'campuses']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
