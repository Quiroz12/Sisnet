<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
      protected $table = 'equipo';
	protected $primaryKey = 'idEquipo';
  public  $timestamps= false;
      protected $fillable = [ 
      'nombreE',
      ];

        public  function dtequipo()
    {
    	return $this->hasMany('App\Dtequipo', 'iddtequipo');
    }

      public  function marca()
    {
      return $this->hasMany('App\Marca', 'idMarca');
    }

}
