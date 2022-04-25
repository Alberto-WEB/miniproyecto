<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResetRequest extends FormRequest
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
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required', 'confirmed',
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [ 
            'token.required' => 'Es necesario que ingreses el token',
            'email.required' => 'Es necesario que ingreses tu corre electronico',
            'password.required' => 'Es necesario que ingreses tu nueva contraseña',
            'password_confirmation.required' => 'Es necesario que confirmes tu nueva contraseña',
        ];
    }
}
