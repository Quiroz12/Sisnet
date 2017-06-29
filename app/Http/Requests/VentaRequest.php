<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VentaRequest extends FormRequest
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
           //'idVenta'=>'required|numeric|unique:venta',
           // 'idfUsuario'=>'required',activar despues de la pruena de inserccion
            'idfProducto'=>'required', 
            //'iddtVenta'=>'required',
            //'fecha_hora'=>'required', este no va porque no se pide atravez del request, sino atraves del controlador
            'totalventa'=>'required',
            'cantidad'=>'required',
            'subtotal'=>'required',
            'precio_v'=>'required',
        ];
    }
}
