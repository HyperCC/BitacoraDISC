<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveEvidenciaRequest extends FormRequest
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
            'ubi_archivo' => '',
            'name_alumno' => '',
            'name_evid' => 'required|min:3',
            'avance_id' => ''
        ];
    }

    public function messages()
    {
        return [
            //'ubi_archivo.required' => 'Debe elegir un archivo para subirlo como Evidencia',
            'name_evid.required' => 'Debe ingresar el nombre de la Evidencia',
            'name_evid.min' => 'El nombre de la Evidencia debe tener al menos 3 caracteres'
        ];
    }
}
