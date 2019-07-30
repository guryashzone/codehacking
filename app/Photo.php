<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	public static $uploads = "/images/";
    protected $fillable = ['file'];
    public function getFileAttribute($photo){
    	return self::$uploads . $photo;
    }
}
