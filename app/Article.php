<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class Article extends Model
{
    //protected $fillable allows database to be mass assignable
    protected $fillable = [
    	'title',

    	'body',
    	
    	'published_at',

    	//'user_id' // temporary!!
    ];
    //passes published_at as a carbon instance for use in the view
    protected $dates = ['published_at'];

    public function scopePublished($query)
    {
    	$query->where('published_at', '<=', Carbon::now());
    }

    public function scopeUnpublished($query)
    {
    	$query->where('published_at', '>', Carbon::now());
    }
    //ensures a carbon instance is saved to db
    public function setPublishedAtAttribute($date)
    {
    	$this->attributes['published_at'] = Carbon::parse($date);
    }

    //Setting relationships
    public function user () 
    {
    	return $this->belongsTo('App\User');
    }

    public function tags ()

    {
        return $this->belongsToMany('App\Tag')->withTimestamps();
    }

    //Get a list of tag Ids associated with the current article
    //@returns array
    public function getTagListAttribute()
    {
        return $this->tags->lists('id')->all();

    }

    public function getPublishedAtAttribute($date)
    {
        return Carbon::parse($date)->format('Y-m-d');
    } 
}
