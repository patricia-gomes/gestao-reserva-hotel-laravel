<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public $timestamps = false;

   function accommodation()
   {
   		return $this->hasMany('App\Accommodation', 'id_type', 'id');
   }
}
