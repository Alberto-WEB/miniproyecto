<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\twEmpresasCorporativo;
use App\Http\Requests\twEmpresaCorporativo\StoreTwEmpresasCorporativosRequest;
use App\Http\Requests\twEmpresaCorporativo\UpdateTwEmpresasCorporativosRequest;

class TwEmpresasCorporativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $empresasCorporativo = twEmpresasCorporativo::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $empresasCorporativo,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    public function store(StoreTwEmpresasCorporativosRequest $request)
    {
        try {
            
            $empresasCorporativo = new twEmpresasCorporativo();
            $empresasCorporativo->S_RazonSocial = $request->S_RazonSocial;
            $empresasCorporativo->S_RFC = $request->S_RFC;
            $empresasCorporativo->S_Pais = $request->S_Pais;
            $empresasCorporativo->S_Estado = $request->S_Estado;
            $empresasCorporativo->S_Municipio = $request->S_Municipio;
            $empresasCorporativo->S_ColoniaLocalidad = $request->S_ColoniaLocalidad;
            $empresasCorporativo->S_Domicilio = $request->S_Domicilio;
            $empresasCorporativo->S_CodigoPostal = $request->S_CodigoPostal;
            $empresasCorporativo->S_UsoCFDI = $request->S_UsoCFDI;
            $empresasCorporativo->S_UrlRFC = $request->S_UrlRFC;
            $empresasCorporativo->S_UrlActaConstitutiva = $request->S_UrlActaConstitutiva;
            $empresasCorporativo->S_Activo = 1;
            $empresasCorporativo->S_Comentarios = $request->S_Comentarios;
            $empresasCorporativo->created_at = now();
            $empresasCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
            //dd($empresasCorporativo);
            $empresasCorporativo->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $empresasCorporativo,
                'exeptions' => [
                    'msgError' => null
                ],
                'time_execution' => microtime()
            ], 201);

        } catch (\Exception $exception) {
            return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'Server error'
                ],
                'exeptions' => [
                    'msgError' => $exception->getMessage()
                ],
                'time_execution' => microtime()
        ], 500);
        }
        
    }

    public function show($id)
    {
            try {

                $empresasCorporativo = twEmpresasCorporativo::find($id);

                if (! $empresasCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el EmpresasCorporativo en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $empresasCorporativo,
                    'exeptions' => [
                        'msgError' => null
                    ],
                    'time_execution' => microtime()
                ], 200);
                
            } catch (\Exception $exception) {
                return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'Server error'
                    ],
                    'exeptions' => [
                        'msgError' => $exception->getMessage()
                    ],
                    'time_execution' => microtime()
            ], 500);
            }
    }

    
    public function update(UpdateTwEmpresasCorporativosRequest $request, $id)
    {
        try {
            
            $empresasCorporativo = twEmpresasCorporativo::find($id);

            if (! $empresasCorporativo) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el EmpresasCorporativo en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $empresasCorporativo->S_RazonSocial = $request->S_RazonSocial;
                $empresasCorporativo->S_RFC = $request->S_RFC;
                $empresasCorporativo->S_Pais = $request->S_Pais;
                $empresasCorporativo->S_Estado = $request->S_Estado;
                $empresasCorporativo->S_Municipio = $request->S_Municipio;
                $empresasCorporativo->S_ColoniaLocalidad = $request->S_ColoniaLocalidad;
                $empresasCorporativo->S_Domicilio = $request->S_Domicilio;
                $empresasCorporativo->S_CodigoPostal = $request->S_CodigoPostal;
                $empresasCorporativo->S_UsoCFDI = $request->S_UsoCFDI;
                $empresasCorporativo->S_UrlRFC = $request->S_UrlRFC;
                $empresasCorporativo->S_UrlActaConstitutiva = $request->S_UrlActaConstitutiva;
                $empresasCorporativo->S_Activo = 1;
                $empresasCorporativo->S_Comentarios = $request->S_Comentarios;
                $empresasCorporativo->created_at = now();
                //$empresasCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
                $empresasCorporativo->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $empresasCorporativo,
                'exeptions' => [
                    'msgError' => null
                ],
                'time_execution' => microtime()
            ], 200);

        } catch (\Exception $exception) {
            return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'Server error'
                ],
                'exeptions' => [
                    'msgError' => $exception->getMessage()
                ],
                'time_execution' => microtime()
        ], 500);
        }
    }

    public function destroy($id)
    {
            try {

                $empresasCorporativo = twEmpresasCorporativo::find($id);

                if (! $empresasCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el EmpresasCorporativo en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                $empresasCorporativo->delete();

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $empresasCorporativo,
                    'exeptions' => [
                        'msgError' => null
                    ],
                    'time_execution' => microtime()
                ], 200);

            
            } catch (\Exception $exception) {
                return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'Server error'
                    ],
                    'exeptions' => [
                        'msgError' => $exception->getMessage()
                    ],
                    'time_execution' => microtime()
            ], 500);
            }
    }


}
