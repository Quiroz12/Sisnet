<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'producto';
	protected $primaryKey = 'idProducto';
	public $incrementing = false;

      protected $fillable = [ 'idProducto','nombre', 'descripcion','image', 'precio', 'stock'];

      public  $timestamps= false;


       public  function dtalmacen()
    {
    	return $this->hasMany('App\Dtalmacen', 'iddtAlmacen');
    }

        public  function dtventa()
    {
    	return $this->hasMany('App\Dtventa', 'iddtVenta');
    }
}
