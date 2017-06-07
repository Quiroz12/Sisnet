<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdUpdateRequest extends FormRequest
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
            'idProducto'=>'required|numeric',
            'nombre'=>'required',
            'descripcion'=>'required',
            'precio'=>'required|numeric',
            
           //de aqui para abajo 
            'idAlmacen'=>'required',//son request de dtalmacen
            'stock'=>'required',
            'stock'=>'required|numeric',
        ];
    }
}
