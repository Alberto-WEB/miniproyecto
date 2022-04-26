<?php

namespace App\Http\Requests\twDocumento;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwDocumentosRequest extends FormRequest
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
            'N_Obligatorio' => 'required',
            //'S_Descripcion' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'S_Nombre.required' => 'Debes ingresar el nombre del documento',
            'N_Obligatorio.required' => 'Debes ingresar el el numero obligatorio'
        ];
    }
}
