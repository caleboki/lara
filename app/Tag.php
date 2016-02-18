<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{
    //fillable fields for a tag
    protected $fillable = [

    	'name'

    ];
    // Get the articles associated with a given tag
    public function articles() 
    {
    	return $this->belongsToMany('App\Article');
    }
}
