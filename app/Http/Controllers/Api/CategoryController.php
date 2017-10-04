<?php

namespace App\Http\Controllers\Api;

use App\EventCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\Category as CategoryResource;

class CategoryController extends Controller
{
    /**
     * Show user per id
     * @return Response JSON
     */
    public function index()
    {
        return new CategoryCollection(EventCategory::all());
    }

    /**
     * Show main category per id
     * @return Response JSON
     */
    public function show($id)
    {
//        $category = EventCategory::find($id);
//        dd($category->mainCategory);
        if (EventCategory::find($id)) {
            return new CategoryResource(EventCategory::find($id));
        } else {
            return response()->json([
                'status_code' => 0,
                'message' => 'Category not found!'
            ]);
        }
    }
}
