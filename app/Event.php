<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $primaryKey = 'event_id';
    protected $fillable = ['name', 'event_date', 'decription', 'photo'];
    public $timestamps = false;

    /**
     * Get the Main category that owns the category.
     */
//    public function mainCategory()
//    {
//        return $this->belongsTo('App\EventMainCategory', 'main_category_id');
//    }
}
