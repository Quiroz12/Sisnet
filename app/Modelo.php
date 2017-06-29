<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
     protected $table = 'modelo';
	protected $primaryKey = 'idModelo';
	  public  $timestamps= false;
      protected $fillable = [ 
      'nombreMo',
      'idMarca',
      ];

       public  function dtequipo()
    {
    	return $this->hasMany('App\Dtequipo', 'iddtequipo');
    }
       public  function equipo()
    {
      return $this->belongsTo('App\Marca', 'idMarca');
    }
}
