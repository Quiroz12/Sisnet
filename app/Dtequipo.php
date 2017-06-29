<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtequipo extends Model
{
     protected $table = 'dtequipo';
	protected $primaryKey = 'iddtequipo';

      protected $fillable = [ 
      'idfEquipo', 
      'idfModelo', 
      'idfMarca',
      'idFalla',
      'nserie',
      ];

      public  $timestamps= false;

       public function equipo()
      {
      	return $this->belongsTo('App\Equipo', 'idfEquipo');
      }

         public function modelo()
      {
      	return $this->belongsTo('App\Modelo', 'idfModelo');
      }
       public function marca()
      {
      	return $this->belongsTo('App\Marca', 'idfMarca');
      }

       public  function falla()
    {
      return $this->belongsTo('App\Falla', 'idFalla');
    }

      public  function dtservicio()
    {
    	return $this->hasMany('App\Dtservicio', 'iddtservicio');
    }
}
