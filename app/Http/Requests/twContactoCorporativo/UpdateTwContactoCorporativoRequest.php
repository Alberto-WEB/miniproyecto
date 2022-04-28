<?php

namespace App\Http\Requests\twContactoCorporativo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwContactoCorporativoRequest extends FormRequest
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
            'S_Nombre' => 'required',
            'S_Puesto' => 'required',
            //'S_Comentarios' => 'required',
            //'N_TelefonoFijo' => 'required',
            //'N_TelefonoMovil' => 'required',
            'S_Email' => 'required',
        ];
    }
    
    public function messages()
    {
        return [ 
            'S_Nombre.required' => 'Es necesario que ingreses tu nombre',
            'S_Puesto.required' => 'Es necesario que ingreses tu puesto',
            'S_Comentarios.required' => 'Es necesario que ingreses un comentario',
            'N_TelefonoFijo.required' => 'Es necesario que ingreses tu telefono fijo de casa',
            'N_TelefonoMovil.required' => 'Es necesario que ingreses tu telefono celular',
            'S_Email.required' => 'Es necesario que ingreses tu email',
        ];
    }
}
