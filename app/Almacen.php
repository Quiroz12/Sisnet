<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
 	protected $table='almacen';

	protected $primaryKey = 'idAlmacen';

      protected $fillable = [ 'nombre', 'direccion', 'idfSucursal', 'direccion', 
    	];

      public  $timestamps= false;


        public function local()
    {
        return $this->belongsTo('App\Local', 'idfSucursal');
    }
}
