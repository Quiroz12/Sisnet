<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServicioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             //'fecha_hora'=>'required',//de aqui es de servicio
             'precio'=>'required|numeric',
             'adelanto'=>'required',
             //'estado'=>'required',
             //'nombreE'=>'required',//de aqui es de equipos
             //'nombreMa'=>'required',
             //'nombreMo'=>'required',
             'nserie'=>'required',             
             'nombreCliente'=>'required',//deaqui dtll servicio
             'telefono'=>'required|numeric',
             //'informacionAdd'=>'required',
             'condicionEntrada'=>'required',
             //'falla'=>'required',
             'descripcionfalla'=>'required',
             //'costopieza'=>'required|numeric', estas no                              
             //'adelanto'=>'required|numeric',   son requeridas
             //'subtotal_p'=>'required|numeric',
             
        ];
    }
}
