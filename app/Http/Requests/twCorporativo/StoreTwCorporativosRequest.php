<?php

namespace App\Http\Requests\twCorporativo;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwCorporativosRequest extends FormRequest
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
            'S_NombreCorto' => 'required',
            'S_NombreCompleto' => 'required',
            'S_DBName' => 'required',
            'S_DBUsuario' => 'required',
            'S_DBPassword' => 'required',
            'S_SystemUrl' => 'required|url',
            'D_FechaIncorporacion' => 'required|date',
        ];
    }

    public function messages()
    {
        return [ 
            'S_NombreCorto.required' => 'Es necesario que ingreses el nombre del corporativo',
            'S_NombreCompleto.required' => 'Es necesario que ingreses el nombre del corporstivo completo',
            'S_DBName.required' => 'Es necesario que ingreses el nombre de la base de datos',
            'S_DBUsuario.required' => 'Es necesario que ingreses el usuario de la base de datos',
            'S_DBPassword.required' => 'Es necesario que ingreses la contraseña de tu base de datos',
            'S_SystemUrl.required' => 'Es necesario que ingreses la URL de tu sistema',
            'S_SystemUrl.url' => 'Ingresa correctamente tu URL por ejemplo, https://ejemplo.com/',
            'D_FechaIncorporacion.required' => 'Es necesario que ingreses la fecha de incorporacion',
            'D_FechaIncorporacion.date' => 'Es necesario que ingreses una fecha valida',
        ];
    }
}
