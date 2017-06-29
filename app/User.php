<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    protected $table='users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =  [
        'id','name', 'email', 'password', 'idSucursal','rol','celular','turno',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function local()
    {
        return $this->belongsTo('App\Local', 'idSucursal');
    }

    public  function ventas()
    {
        return $this->hasMany('App\Venta', 'idVenta');
    }

    public function servicios()
    {
        return $this->hasMany('App\Servicio','idServicio');
    }
}
