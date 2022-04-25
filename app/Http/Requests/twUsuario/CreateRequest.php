<?php

namespace App\Http\Requests\twUsuario;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'username' => 'required',
            'email' => 'required|string|email|unique:tw_usuarios',
            'S_Nombre' => 'required',
            'S_Apellidos' => 'required',
            'password' => 'required|min:8',
        ];
    }

    public function messages()
    {
        return [ 
            'username.required' => 'Es necesario que ingreses tu nombre de usuario',
            'email.required' => 'Es necesario que ingreses tu corre electronico',
            'email.unique' => 'El correo que intenta registrar ya existe, prueba con otro',
            'email.email' => 'El formato del email es incorrecto',
            'S_Nombre.required' => 'Es necesario que ingreses tu nombre',
            'S_Apellidos.required' => 'Es necesario que ingreses tus apellidos',
            'password.required' => 'Es necesario que ingreses tu password',
            'password.min' => 'tu password debe incluir al menos 8 caracteres',
        ];
    }
}
