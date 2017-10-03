<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Event Main Category model
 * For Event Main Category eloquent
 * primary key @primaryKey main_category_id
 * @package App
 */
class EventMainCategory extends Model
{
    protected $primaryKey = 'main_category_id';
    protected $fillable = ['name'];
    public $timestamps = false;

    /**
     * Get the category that owns the main category.
     */
    public function category()
    {
        return $this->hasMany('App\EventCategory', 'main_category_id');
    }
}
