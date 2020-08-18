<?php

namespace App\Model\User;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title','slug', 'body'];

    public function tags()
    {
    	return $this->belongsToMany('App\Model\User\tag','post_tags')->withTimestamps();
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Model\User\postcategory','post_postcategories')->withTimestamps();
    }

    public function getRouteKeyName()
    {
    	return 'slug';
    }

    public function comments()
    {
        return $this->hasMany(comment::class)->whereNull('parent_id');
    }
}