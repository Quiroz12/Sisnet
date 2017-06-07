<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
	protected $primaryKey = 'idProducto';

      protected $fillable = [ 'idProducto','nombre', 'descripcion','image', 'precio',];

      public  $timestamps= false;


       public  function dtalmacen()
    {
    	return $this->hasMany('App\Dtalmacen', 'iddtAlmacen');
    }
}
