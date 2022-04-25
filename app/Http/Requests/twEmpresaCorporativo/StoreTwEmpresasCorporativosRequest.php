<?php

namespace App\Http\Requests\twEmpresaCorporativo;

use Illuminate\Foundation\Http\FormRequest;

class StoreTwEmpresasCorporativosRequest extends FormRequest
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
            'S_RazonSocial' => 'required',
            'S_RFC' => 'required',
            //'S_Pais' => 'required',
            //'S_Estado' => 'required',
            //'S_Municipio' => 'required',
            //'S_ColoniaLocalidad' => 'required',
            //'S_Domicilio' => 'required',
            //'S_CodigoPostal' => 'required',
            //'S_UsoCFDI' => 'required',
            //'S_UrlActaConstitutiva' => 'required|url',
            //'S_UrlRFC' => 'required|url',
            //'S_Comentarios' => 'required',
        ];
    }

    public function messages()
    {
        return [ 
            'S_RazonSocial.required' => 'Es necesario que ingreses tu razon social',
            'S_RFC.required' => 'Es necesario que ingreses tu RFC',
            'S_Pais.required' => 'Es necesario que ingreses tu pais',
            'S_Estado.required' => 'Es necesario que ingreses tu estado',
            'S_Municipio.required' => 'Es necesario que ingreses tu municipio',
            'S_ColoniaLocalidad.required' => 'Es necesario que ingreses tu colonia o localidad',
            'S_Domicilio.required' => 'Es necesario que ingreses tu domicilio completo',
            'S_CodigoPostal.required' => 'Es necesario que ingreses tu CP',
            'S_UsoCFDI.required' => 'Es necesario que ingreses tu uso de CFDI',
            'S_UrlActaConstitutiva.required' => 'Es necesario que ingreses la url del acta contitutiva de tu empresa',
            'S_UrlActaConstitutiva.url' => 'Ingresa correctamente tu URL por ejemplo, https://ejemplo.com/',
            'S_UrlRFC.required' => 'Es necesario que ingreses tu url de tu RFC',
            'S_UrlRFC.url' => 'Ingresa correctamente tu URL por ejemplo, https://ejemplo.com/',
            'S_Comentarios.required' => 'Es necesario que incluyas un comentario',
        ];
    }
}
