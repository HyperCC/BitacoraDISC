<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BitacoraStoreRequest extends FormRequest
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
            'est1' => 'required',
            'id_profesor1' => 'required',
            'titulo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'est1.required' => 'El estudiante uno es requerido',
        ];
    }
}
