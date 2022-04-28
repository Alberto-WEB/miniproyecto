<?php

namespace App\Http\Requests\twDocumentoCorporativo;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTwDocumentoCorporativoRequest extends FormRequest
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
            //'S_ArchivoUrl' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'S_ArchivoUrl.required' => 'Debes ingresar la url del archivo'
        ];
    }
}
