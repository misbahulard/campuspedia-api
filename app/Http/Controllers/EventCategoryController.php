<?php

namespace App\Http\Controllers;

use App\EventCategory;
use App\EventMainCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
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
        $main_categories = EventMainCategory::paginate(5);
        $categories = EventCategory::paginate(5);
        return view('/event-categories/index', compact(['main_categories', 'categories']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = EventMainCategory::all();
        return view('/event-categories/create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = $this->validate(request(), [
            'name' => 'required',
            'main_category_id' => 'required'
        ]);

        EventCategory::create($category);

        return redirect('event-categories')->with('status-category', 'New category has been created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('/event-categories/show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $main_category_list = EventMainCategory::all();
        $category = EventCategory::find($id);
        return view('/event-categories/edit', compact(['category', 'main_category_list']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required',
            'main_category_id' => 'required'
        ]);

        $category = EventCategory::find($id);
        $category->name = $request->get('name');
        $category->main_category_id = $request->get('main_category_id');
        $category->save();

        return redirect('event-categories')->with('status-category', 'Category has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = EventCategory::find($id);
        $category->delete();
        return redirect('event-categories')->with('status-category', 'Delete success!');
    }
}
