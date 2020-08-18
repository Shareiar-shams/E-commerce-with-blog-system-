<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class arrival extends Model
{
    public function categories()
    {
    	return $this->belongsToMany('App\Model\Admin\ArrivalCategory','arrival_connect_categories')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
