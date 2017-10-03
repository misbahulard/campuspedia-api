<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Event Location model
 * For Event Location eloquent
 * primary key @primaryKey event_location_id
 * @package App
 */
class EventLocation extends Model
{
    protected $primaryKey = 'event_location_id';
    protected $fillable = ['street_address', 'postal_code', 'city', 'state_province', 'latitude', 'longtitude'];
    public $timestamps = false;

    public function location() {
        return $this->hasMany('App\Event');
    }
}
