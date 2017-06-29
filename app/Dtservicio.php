<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtservicio extends Model
{
    protected $table='dtservicio';

	protected $primaryKey = 'iddtservicio';
public  $timestamps= false;
      protected $fillable = [
      'idServicio', 
      'iddtequipo', 
      
      'nombreCliente', 
      'telefono',
      'informacionAdd', 
      'condicionEntrada',
      'descripcion',
      'costopieza', 
      'adelanto',
      'subtotal',
      'estado',
    	];

    	 public function servicios()
      {
      	return $this->belongsTo('App\Servicio', 'idServicio');
      }

         public function dtequipo()
      {
      	return $this->belongsTo('App\Dtequipo', 'iddtequipo');
      }

      
}
