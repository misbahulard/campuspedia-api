<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Campus Location model
 * For Campus Location eloquent
 * primary key @primaryKey campus_location_id
 * @package App
 */
class CampusLocation extends Model
{
    protected $primaryKey = 'campus_location_id';
    protected $fillable = ['street_address', 'postal_code', 'city', 'state_province', 'latitude', 'longtitude'];
    public $timestamps = false;

    public function location() {
        return $this->hasMany('App\Campus');
    }
}
