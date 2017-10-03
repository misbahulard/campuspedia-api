<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Event model
 * For Event eloquent
 * primary key @primaryKey event_id
 * @package App
 */
class Event extends Model
{
    protected $primaryKey = 'event_id';
    protected $fillable = ['name', 'event_date', 'decription', 'photo'];
    public $timestamps = false;

    public function location() {
        return $this->belongsTo('App\EventLocation', 'event_location_id');
    }

    public function campus() {
        return $this->belongsTo('App\Campus', 'campus_id');
    }

    public function category() {
        return $this->belongsTo('App\EventCategory', 'category_id');
    }

    public function reminder() {
        return $this->hasMany('App\Reminder');
    }
}
