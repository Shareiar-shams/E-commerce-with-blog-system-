<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
	public function product()
    {
    	return $this->belongsToMany('App\Model\Admin\product','product_subcategories')->where('status',1)->orderBy('created_at','DESC')->paginate(9);
    }
    public function categories()
    {
    	return $this->belongsToMany('App\Model\Admin\product_category','category_subcategories')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

}
