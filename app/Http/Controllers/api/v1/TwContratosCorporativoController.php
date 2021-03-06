<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\twContratoCorporativo\StoreTwContratosCorporativosRequest;
use App\Http\Requests\twContratoCorporativo\UpdateTwContratosCorporativosRequest;
use App\Models\twContratosCorporativo;

class TwContratosCorporativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $contratoCorporativo = twContratosCorporativo::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $contratoCorporativo,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    
    public function store(StoreTwContratosCorporativosRequest $request)
    {
        try {
            
            $contratoCorporativo = new twContratosCorporativo();
            $contratoCorporativo->D_FechaInicio = $request->D_FechaInicio;
            $contratoCorporativo->D_FechaFin = $request->D_FechaFin;
            $contratoCorporativo->S_URLContrato = $request->S_URLContrato;
            $contratoCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
            //dd($contratoCorporativo);
            $contratoCorporativo->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $contratoCorporativo,
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

                $contratoCorporativo = twContratosCorporativo::find($id);

                if (! $contratoCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el ContratoCorporativo en la DB'
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
                    'data' => $contratoCorporativo,
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

    public function update(UpdateTwContratosCorporativosRequest $request, $id)
    {
        try {
            
            $contratoCorporativo = twContratosCorporativo::find($id);

            if (! $contratoCorporativo) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el ContratoCorporativo en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $contratoCorporativo->D_FechaInicio = $request->D_FechaInicio;
                $contratoCorporativo->D_FechaFin = $request->D_FechaFin;
                $contratoCorporativo->S_URLContrato = $request->S_URLContrato;
                $contratoCorporativo->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $contratoCorporativo,
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

                $contratoCorporativo = twContratosCorporativo::find($id);

                if (! $contratoCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el ContratoCorporativo en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                $contratoCorporativo->delete();

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $contratoCorporativo,
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
