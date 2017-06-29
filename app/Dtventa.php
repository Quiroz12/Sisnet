<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dtventa extends Model
{
      protected $table = 'dtventa';
	protected $primaryKey = 'iddtventa';

      protected $fillable = [ 
      'idVenta',
      'idfPoducto', 
      'cantidad',
      'subtotal',
      'precio_v', 
      'estado',
      ];

      public  $timestamps= false;

      public function productos()
      {
      	return $this->belongsTo('App\Producto', 'idfProducto');
      }

         public function ventas()
      {
      	return $this->belongsTo('App\Venta', 'idVenta');
      }
}

