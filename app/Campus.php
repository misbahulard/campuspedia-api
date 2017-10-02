<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $primaryKey = 'campus_id';
    protected $fillable = ['name', 'web', 'logo'];
    public $timestamps = false;

    public function location() {
        return $this->belongsTo('App\CampusLocation', 'campus_location_id');
    }

}
