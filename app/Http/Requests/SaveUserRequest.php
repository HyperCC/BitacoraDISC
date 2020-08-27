<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveUserRequest extends FormRequest
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
            'name'=>'nullable',
            'rut'=>'nullable|min:8',
            'carrera'=>'nullable|min:4',
            'email'=>'required|unique:users',
            'password'=>'required|min:8',
            'rol'=>'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'Debe ingresar un E-mail',
            'email.unique'=>'Este E-mail ya fue ingresado, intente con otro',
            'password.required'=>'Debe ingresar una contraseña',
            'password.min'=>'La contraseña debe ser de al menos 8 caracteres',
            'rut.min'=>'El rut debe ser de al menos 8 caracteres de largo para ser válido',
            'rol.required'=>'Debe elegir un rol'
        ];
    }
}
