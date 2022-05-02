<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\twCorporativo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\twCorporativo\StoreTwCorporativosRequest;
use App\Http\Requests\twCorporativo\UpdateTwCorporativosRequest;
use App\Models\twContactosCorporativo;
use App\Models\twContratosCorporativo;
use App\Models\twDocumento;
use App\Models\twDocumentosCorporativo;
use App\Models\twEmpresasCorporativo;
use Illuminate\Support\Facades\DB;

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

                return response()->json(null, 204);

            
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

        try {
            
            $corporativo = twCorporativo::findOrFail($id);
            //dd($corporativo);
    
            $empresasCorporativo = DB::table('tw_corporativos as twc')
                                    ->join('tw_empresas_corporativos as twec', 'twc.id', '=', 'twec.tw_corporativos_id')
                                    ->where('twec.tw_corporativos_id', $corporativo->id)
                                    ->get('twec.*');
            
            $contactosCorporativo = DB::table('tw_corporativos as twc')
                                    ->join('tw_contactos_corporativos as twcc', 'twc.id', '=', 'twcc.tw_corporativos_id')
                                    ->where('twcc.tw_corporativos_id', $corporativo->id)
                                    ->get('twcc.*');
    
            $contratosCorporativo = DB::table('tw_corporativos as twc')
                                    ->join('tw_contratos_corporativos as twcontratosc', 'twc.id', '=', 'twcontratosc.tw_corporativos_id')
                                    ->where('twcontratosc.tw_corporativos_id', $corporativo->id)
                                    ->get('twcontratosc.*');
    
            $documentosCorporativo = DB::table('tw_corporativos as twc')
                                    ->join('tw_documentos_corporativos as twdc', 'twc.id', '=', 'twdc.tw_corporativos_id')
                                    ->join('tw_documentos as twd', 'twdc.tw_documentos_id', '=', 'twd.id')
                                    ->where('twdc.tw_corporativos_id', $corporativo->id)
                                    ->select('twd.S_Nombre', 'twdc.S_ArchivoUrl')
                                    ->get();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => [
                    'Corporativo' => $corporativo,
                    'tw_empresas_corporativo' => $empresasCorporativo,
                    'tw_contactos_corporativo' => $contactosCorporativo,
                    'tw_contratos_csorporativo' => $contratosCorporativo,
                    'tw_documentos_corporativo' => $documentosCorporativo,
                ],
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
