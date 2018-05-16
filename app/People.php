<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{
    public function notes()
    {
    	return $this->hasMany('App\Note')->orderBy('created_at', 'desc');
    }

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }

    public function conversations()
    {
    	return $this->belongsTo('App\Conversation');
    }
}
