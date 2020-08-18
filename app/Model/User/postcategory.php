<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class postcategory extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Model\User\post','post_postcategories')->where('status',1)->orderBy('created_at','DESC')->paginate(4);
    }
    public function post()
    {
    	return $this->belongsToMany('App\Model\User\post','post_postcategories')->where('status',1);
    }
    
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
