<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function peoples()
    {
    	return $this->hasMany('App\People');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
