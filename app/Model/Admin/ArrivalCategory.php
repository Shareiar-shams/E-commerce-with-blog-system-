<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class ArrivalCategory extends Model
{
    public function arrivals()
    {
    	return $this->belongsToMany('App\Model\Admin\arrival','arrival_connect_categories')->where('status',1)->orderBy('created_at','DESC')->paginate(6);
    }
    public function arrival()
    {
    	return $this->belongsToMany('App\Model\Admin\arrival','arrival_connect_category')->where('status',1);
    }
    
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
