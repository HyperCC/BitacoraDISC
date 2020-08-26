<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveComentarioRequest extends FormRequest
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
            'nombre'=>'required|min:3',
            'nombre_profesor'=>'',
            'comentario'=>'required|min:8',
            'avance_id'=>''
        ];
    }

    /**
     * @return array|string[]
     */
    public function messages()
    {
        return [
            'nombre.required'=>'Debe ingresar un título para este Comentario',
            'nombre.min'=>'Debe ingresar un título de al menos 3 caracteres de largo',
            'comentario.required'=>'Debe ingresar un Comentario',
            'comentario.min'=>'Debe ingresar un Comentario de almenos 8 caracteres de largo'
        ];
    }
}
