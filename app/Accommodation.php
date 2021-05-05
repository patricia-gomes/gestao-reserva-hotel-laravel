<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accommodation extends Model
{
    public $timestamps = false;

   	public function types()
   	{
        return $this->belongsTo('App\Type', 'id_type', 'id');
    }
}