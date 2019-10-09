<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	public function employee(){
	    return $this->belongsTo('App\Employee');
	}

	public function services()
	{
		return $this->belongsToMany('App\Service')->withPivot('quantity')->withTimestamps();
	}

	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

}