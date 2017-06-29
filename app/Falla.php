<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Falla extends Model
{
      protected $table='falla';

	protected $primaryKey = 'idFalla';
public  $timestamps= false;
      protected $fillable = [
      'descripcionfalla'
    	];

    	 public  function dtequipo()
    {
    	return $this->hasMany('App\Dtequipo', 'iddtequipo');
    }
}
