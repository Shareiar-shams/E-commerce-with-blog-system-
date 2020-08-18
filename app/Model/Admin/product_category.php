<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
    //  public function subcategories()
    // {
    // 	return $this->belongsToMany('App\Model\Admin\subcategory','category_subcategory')->where('status',1)->orderBy('created_at','DESC')->paginate(6);
    // }
    public function subcategories()
    {
    	return $this->belongsToMany('App\Model\Admin\subcategory','category_subcategories')->orderBy('created_at','DESC');
    }
    public function subcategory()
    {
    	return $this->belongsToMany('App\Model\Admin\subcategory','category_subcategories');
    }
    
    public function getRouteKeyName()
    {
    	return 'slug';
    }
}
