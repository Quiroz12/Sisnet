<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtalmacen extends Model
{
    protected $table = 'dtalmacen';
	protected $primaryKey = 'iddtAlmacen';

      protected $fillable = [ 'idProducto', 'idAlmacen', 'stock', 
      ];

      public  $timestamps= false;


     public function almacen()
    {
        return $this->belongsTo('App\Almacen', 'idAlmacen');
    }

       public function productos()
    {
        return $this->belongsTo('App\Producto', 'idProducto');
    } 
}
