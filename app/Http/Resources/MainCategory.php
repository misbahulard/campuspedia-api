<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MainCategory extends Resource
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
            'main_category_id' => $this->main_category_id,
            'name' => $this->name,
            'category' => Category::collection($this->category)
        ];
    }
}
