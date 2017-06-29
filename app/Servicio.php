<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
     protected $table='servicio';

	protected $primaryKey = 'idServicio';
	public  $timestamps= false;
      protected $fillable = [
      'idUsuario', 
      'fecha_hora',
      'precio',
      'estado',

    	];
    public function user()
    {
        return $this->belongsTo('App\User', 'idUsuario');
    }
    	 public  function dtservicio()
    {
    	return $this->hasMany('App\Dtservicio', 'iddtservicio');
    }
}
