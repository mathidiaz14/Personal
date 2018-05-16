<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    public function people()
    {
    	return $this->belongsTo('App\People');
    }
}
