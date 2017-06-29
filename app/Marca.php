<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
      protected $table = 'marca';
	protected $primaryKey = 'idMarca';
  public  $timestamps= false;
      protected $fillable = [ 
      'nombreMa',
      'idEquipo,'
      ];

       public  function dtequipo()
    {
    	return $this->hasMany('App\Dtequipo', 'iddtequipo');
    }
      public  function equipo()
    {
      return $this->belongsTo('App\Equipo', 'idEquipo');
    }

      public  function modelo()
    {
      return $this->hasMany('App\Modelo', 'idModelo');
    }
}
