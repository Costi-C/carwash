<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{

	public function category()
	{
		return $this->belongsTo('App\Category');
	}
}