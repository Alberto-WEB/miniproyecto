<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\twCorporativo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\twCorporativo\StoreTwCorporativosRequest;
use App\Http\Requests\twCorporativo\UpdateTwCorporativosRequest;

class TwCorporativosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        $corporativo = twCorporativo::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $corporativo,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    public function store(StoreTwCorporativosRequest $request)
    {
        try {
            
            $corporativo = new twCorporativo();
            $corporativo->S_NombreCorto = $request->S_NombreCorto;
            $corporativo->S_NombreCompleto = $request->S_NombreCompleto;
            $corporativo->S_LogoURL = '';
            $corporativo->S_DBName = $request->S_DBName;
            $corporativo->S_DBUsuario = $request->S_DBUsuario;
            $corporativo->S_DBPassword = $request->S_DBPassword;
            $corporativo->S_SystemUrl = $request->S_SystemUrl;
            $corporativo->S_Activo = 1;
            $corporativo->D_FechaIncorporacion = $request->D_FechaIncorporacion;
            $corporativo->created_at = now();
            $corporativo->tw_usuarios_id = Auth::user()->id;
            $corporativo->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $corporativo,
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

                $corporativo = twCorporativo::find($id);

                if (! $corporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el corporativo en la DB'
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
                    'data' => $corporativo,
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

    public function update(UpdateTwCorporativosRequest $request, $id)
    {
        try {
            
            $corporativo = twCorporativo::find($id);

            if (! $corporativo) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el corporativo en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $corporativo->S_NombreCorto = $request->S_NombreCorto;
                $corporativo->S_NombreCompleto = $request->S_NombreCompleto;
                $corporativo->S_LogoURL = '';
                $corporativo->S_DBName = $request->S_DBName;
                $corporativo->S_DBUsuario = $request->S_DBUsuario;
                $corporativo->S_DBPassword = $request->S_DBPassword;
                $corporativo->S_SystemUrl = $request->S_SystemUrl;
                $corporativo->S_Activo = 1;
                $corporativo->D_FechaIncorporacion = $request->D_FechaIncorporacion;
                $corporativo->created_at = now();
                $corporativo->tw_usuarios_id = Auth::user()->id;
                $corporativo->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $corporativo,
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

                $corporativo = twCorporativo::find($id);

                if (! $corporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el corporativo en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                $corporativo->delete();

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $corporativo,
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

    public function corporativo($id){
        
        $corporativo = twCorporativo::find($id);
        $corporativo = twCorporativo::join('tw_contactos_corporativos', 'tw_contactos_corporativos.tw_corporativos_id', '=', 'tw_corporativos.id')
                                        ->join('tw_contratos_corporativos', 'tw_contratos_corporativos.tw_corporativos_id', '=', 'tw_corporativos.id')
                                        ->get(['tw_corporativos.*', 'tw_contactos_corporativos.*']);
        dd($corporativo);
                                        return $corporativo;
    }

}
