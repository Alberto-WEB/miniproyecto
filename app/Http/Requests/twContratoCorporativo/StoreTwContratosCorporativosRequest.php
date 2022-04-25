<?php

namespace App\Http\Requests\twContratoCorporativo;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwContratosCorporativosRequest extends FormRequest
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
            'D_FechaInicio' => 'required|date',
            'D_FechaFin' => 'required',
            //'S_URLContrato' => 'required|url',
        ];
    }

    public function messages()
    {
        return [ 
            'D_FechaInicio.required' => 'Es necesario que ingreses la fecha de inicio',
            'D_FechaInicio.date' => 'Es necesario que ingreses una fecha valida',
            'D_FechaFin.required' => 'Es necesario que ingreses la hora de finalizacion',
            'S_URLContrato.required' => 'Es necesario que ingreses la url de tu contrato',
            'S_URLContrato.url' => 'Ingresa correctamente tu URL por ejemplo, https://ejemplo.com/',
        ];
    }
}
