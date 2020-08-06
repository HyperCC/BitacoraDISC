<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveAvanceRequest extends FormRequest
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
            'nombre' => '',
            'descripcion' => 'required|min:12',
            'user_id' => '',
            'bitacora_id' => ''
        ];
    }

    public function messages()
    {
        return [
            'descripcion.required'=>'Debe ingresar la descripción del Avance',
            'descripcion.min'=>'La descripción debe tener al menos 12 caracteres'
        ];
    }
}
