<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\twDocumentoCorporativo\StoreTwDocumentoCorporativoRequest;
use App\Http\Requests\twDocumentoCorporativo\UpdateTwDocumentoCorporativoRequest;
use App\Models\twDocumentosCorporativo;
use Illuminate\Http\Request;

class TwDocumentosCorporativoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $documentoCorporativo = twDocumentosCorporativo::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $documentoCorporativo,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    
    public function store(StoreTwDocumentoCorporativoRequest $request)
    {
        try {
            
            $documentoCorporativo = new twDocumentosCorporativo();
            $documentoCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
            $documentoCorporativo->tw_documentos_id = $request->tw_documentos_id;
            $documentoCorporativo->S_ArchivoUrl = $request->S_ArchivoUrl;
            $documentoCorporativo->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $documentoCorporativo,
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

                $documentoCorporativo = twDocumentosCorporativo::find($id);

                if (! $documentoCorporativo) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el documentoCorporativo en la DB'
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
                    'data' => $documentoCorporativo,
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

    public function update(UpdateTwDocumentoCorporativoRequest $request, $id)
    {
        try {
            
            $documentoCorporativo = twDocumentosCorporativo::find($id);

            if (! $documentoCorporativo) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el documentoCorporativo en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

                $documentoCorporativo->tw_corporativos_id = $request->tw_corporativos_id;
                $documentoCorporativo->tw_documentos_id = $request->tw_documentos_id;
                $documentoCorporativo->S_ArchivoUrl = $request->S_ArchivoUrl;
                $documentoCorporativo->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $documentoCorporativo,
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

                $documentoCorporativo = twDocumentosCorporativo::find($id);

                if (! $documentoCorporativo) {
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

                $documentoCorporativo->delete();
                
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
}

