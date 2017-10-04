<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class Campus extends Resource
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
            'campus_id' => $this->campus_id,
            'name' => $this->name,
            'web' => $this->web,
            'logo' => $this->logo
        ];
    }
}
