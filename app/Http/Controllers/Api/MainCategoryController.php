<?php

namespace App\Http\Controllers\Api;

use App\EventMainCategory;
use App\Http\Controllers\Controller;
use App\Http\Resources\MainCategory as MainCategoryResource;
use App\Http\Resources\MainCategoryCollection;

class MainCategoryController extends Controller
{
    /**
     * Show user per id
     * @return Response JSON
     */
    public function index()
    {
        return new MainCategoryCollection(EventMainCategory::paginate());
    }

    /**
     * Show main category per id
     * @return Response JSON
     */
    public function show($id)
    {
        if (EventMainCategory::find($id)) {
            return new MainCategoryResource(EventMainCategory::find($id));
        } else {
            return response()->json([
                'data' => [
                    'message' => 'Main Category not found!'
                ],
                'meta' => [
                    'status_code' => 0,
                ]
            ]);
        }
    }
}
