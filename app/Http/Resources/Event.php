<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Event extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'event_id' => $this->event_id,
            'name' => $this->name,
            'description' => $this->description,
            'photo' => $this->photo,
            'event_date' => $this->event_date,
            'main_category' => $this->category->mainCategory->name,
            'category' => $this->category->name,
            'campus' => $this->campus->name,
            'location' => $this->location,
        ];
    }
}
