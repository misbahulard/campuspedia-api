<?php

namespace App\Http\Controllers\Api;

use App\Campus;
use App\Http\Controllers\Controller;
use App\Http\Resources\Campus as CampusResource;
use App\Http\Resources\CampusCollection;

class CampusController extends Controller
{
    /**
     * Show all campus
     * @return Response JSON
     */
    public function index()
    {
        return new CampusCollection(Campus::paginate());
    }

    /**
     * Show campus per id
     * @return Response JSON
     */
    public function show($id)
    {
        if (Event::find($id)) {
            return new CampusResource(Campus::find($id));
        } else {
            return response()->json([
                'data' => [
                    'message' => 'Campus not found!'
                ],
                'meta' => [
                    'status_code' => 0,
                ]
            ]);
        }
    }
}
