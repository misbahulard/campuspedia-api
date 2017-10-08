<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CampusCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'meta' => [
                'event_img_path' => url('/') . '/img/events/',
                'campus_img_path' => url('/') . '/img/campuses/',
                'status_code' => 1
            ]
        ];
    }
}
