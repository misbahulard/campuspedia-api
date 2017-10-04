<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class User extends Resource
{
    /**
     * Transform the resource into an array.
     * Status Code 0 = not authenticated, 1 = authenticated
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'user_id' => $this->user_id,
            'name' => $this->name,
            'email' => $this->email,
            'photo' => $this->photo,
            'api_token' => $this->api_token,
            'status_code' => 1
        ];
    }
}
