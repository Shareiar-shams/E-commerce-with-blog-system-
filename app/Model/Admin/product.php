<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    public function subcategories()
    {
    	return $this->belongsToMany('App\Model\Admin\subcategory','product_subcategories')->orderBy('created_at','DESC');
    }
     public function getRouteKeyName()
    {
    	return 'slug';
    }
}
