<?php

namespace App;
use App\User;
use App\Photo;
use App\Category;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
    	'user_id', //remove
    	'category_id',
    	'photo_id',
    	'title',
    	'body'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
    public function photo()
    {
    	return $this->belongsTo('App\Photo');
    }
    public function category()
    {
    	return $this->belongsTo('App\category');
    }
}
