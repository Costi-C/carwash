<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
	public function orders(){
	    return $this->belongsToMany('App\Order')->withPivot('quantity')->withTimestamps();
	}

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}