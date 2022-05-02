<?php

namespace App\Http\Controllers\api\v1;

use App\Models\twDocumento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\twDocumento\StoreTwDocumentosRequest;
use App\Http\Requests\twDocumento\UpdateTwDocumentosRequest;

class TwDocumentosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $documentos = twDocumento::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $documentos,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    public function store(StoreTwDocumentosRequest $request)
    {
        try {
            
            $documentos = new twDocumento();
            $documentos->S_Nombre = $request->S_Nombre;
            $documentos->N_Obligatorio = $request->N_Obligatorio;
            $documentos->S_Descripcion = $request->S_Descripcion;
            $documentos->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $documentos,
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

                $documentos = twDocumento::find($id);

                if (! $documentos) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el documentos en la DB'
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
                    'data' => $documentos,
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

    public function update(UpdateTwDocumentosRequest $request, $id)
    {
        try {
            
            $documentos = twDocumento::find($id);

            if (! $documentos) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el documentos en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $documentos->S_Nombre = $request->S_Nombre;
                $documentos->N_Obligatorio = $request->N_Obligatorio;
                $documentos->S_Descripcion = $request->S_Descripcion;
                $documentos->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $documentos,
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

                $documentos = twDocumento::find($id);

                if (! $documentos) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el documentos en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }

                $documentos->delete();
                
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

    public function documento($id){
        try {
            
            $documento = twDocumento::findOrFail($id);

            $documentosCorporativo = DB::table('tw_corporativos as twc')
            ->join('tw_documentos_corporativos as twdc', 'twc.id', '=', 'twdc.tw_corporativos_id')
            ->join('tw_documentos as twd', 'twdc.tw_documentos_id', '=', 'twd.id')
            ->where('twdc.tw_corporativos_id', $documento->id)
            ->select('twd.S_Nombre', 'twdc.S_ArchivoUrl')
            ->get();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => [
                    //'documento' => $documento,
                    'documentosCargados' => $documentosCorporativo
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
