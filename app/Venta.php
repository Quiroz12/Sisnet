<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
      protected $table = 'venta';
	protected $primaryKey = 'idVenta';

      protected $fillable = [ 'idfUsuario', 'fecha_hora', 'estado', 'totalventa', 
     ];

      public  $timestamps= false;

       public function user()
    {
        return $this->belongsTo('App\User', 'idfUsuario');
    }

        public  function dtventa()
    {
    	return $this->hasMany('App\Dtventa', 'iddtVenta');
    }
}
