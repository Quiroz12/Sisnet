<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Local extends Model
{	
    protected $table = 'sucursal';
	protected $primaryKey = 'idSucursal';

      protected $fillable = [ 'nombre', 'razonSocial', 'rfc', 'direccion', 
      'ciudad', 'telefono' , 'codigoPost',];

      public  $timestamps= false;

       public function user()
     {
     	return $this->hasMany('App\User', 'id');
     }

       public function almacen()
     {
     	return $this->hasMany('App\Almacen', 'idAlmacen');
     }
}
