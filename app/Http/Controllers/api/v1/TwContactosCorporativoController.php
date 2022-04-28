<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\twContactoCorporativo\StoreTwContactoCorporativoRequest;
use App\Http\Requests\twContactoCorporativo\UpdateTwContactoCorporativoRequest;
use App\Models\twContactosCorporativo;
use Illuminate\Http\Request;

class TwContactosCorporativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $contactoCorporativo = twContactosCorporativo::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $contactoCorporativo,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

     
    public function store(StoreTwContactoCorporativoRequest $request)
    {
        try {
            
            $contactoCorporativo = new twContactosCorporativo();
            $contactoCorporativo->S_Nombre = $request->S_Nombre;
            $contactoCorporativo->S_Puesto = $request->S_Puesto;
            $contactoCorporativo->S_Comentarios = $request->S_Comentarios;
            $contactoCorporativo->N_TelefonoFijo = $request->N_TelefonoFijo;
            $contactoCorporativo->N_TelefonoMovil = $request->N_TelefonoMovil;
            $contactoCorporativo->S_Email = $request->S_Email;
            $contactoCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
            $contactoCorporativo->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $contactoCorporativo,
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

                $contactoCorporativo = twContactosCorporativo::find($id);

                if (! $contactoCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el contactoCorporativo en la DB'
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
                    'data' => $contactoCorporativo,
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

    public function update(UpdateTwContactoCorporativoRequest $request, $id)
    {
        try {
            
            $contactoCorporativo = twContactosCorporativo::find($id);

            if (! $contactoCorporativo) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el contactoCorporativo en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $contactoCorporativo->S_Nombre = $request->S_Nombre;
                $contactoCorporativo->S_Puesto = $request->S_Puesto;
                $contactoCorporativo->S_Comentarios = $request->S_Comentarios;
                $contactoCorporativo->N_TelefonoFijo = $request->N_TelefonoFijo;
                $contactoCorporativo->N_TelefonoMovil = $request->N_TelefonoMovil;
                $contactoCorporativo->S_Email = $request->S_Email;
                $contactoCorporativo->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $contactoCorporativo,
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

                $contactoCorporativo = twContactosCorporativo::find($id);

                if (! $contactoCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el contactoCorporativo en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                $contactoCorporativo->delete();

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $contactoCorporativo,
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
