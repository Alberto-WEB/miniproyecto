<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\twUsuario\CreateRequest;
use App\Http\Requests\twUsuario\UpdateRequest;
use App\Models\twUsuario;
use Illuminate\Http\Request;

class TwUsuariosController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()
    {
        $user = twUsuario::all();

        return response()->json([
            'msg' => 'OK',
            'success' => true,
            'data' => $user,
            'exeptions' => [
                'msgError' => null
            ],
            'time_execution' => microtime()
        ], 200);
    }

    
    public function store(CreateRequest $request)
    {
        try {
            
            $user = new twUsuario();
            $user->username = $request->username;
            $user->email = $request->email;
            $user->S_Nombre = $request->S_Nombre;
            $user->S_Apellidos = $request->S_Apellidos;
            $user->S_FotoPerfilUrl = '';
            $user->S_Activo = 1;
            $user->password = $request->password;
            $user->verified = 'DISABLED';
            $user->created_at = now();
            $user->save();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $user,
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

    
    public function show($id)
    {
            try {

                $user = twUsuario::find($id);

                if (! $user) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el usuario en la DB'
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
                    'data' => $user,
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

    
    public function update(UpdateRequest $request, $id)
    {
        try {
            
            $user = twUsuario::find($id);

            if (! $user) {
                return response()->json([
                'msg' => 'BAD',
                'success' => false,
                'data' => [
                    'msgError' => 'No existe el usuario en la DB'
                ],
                'exeptions' => [
                    'msgError' => NULL
                ],
                'time_execution' => microtime()
                    ], 404);
                }

            $user->username = $request->username;
            $user->email = $request->email;
            $user->S_Nombre = $request->S_Nombre;
            $user->S_Apellidos = $request->S_Apellidos;
            $user->S_FotoPerfilUrl = '';
            $user->S_Activo = 1;
            $user->password = $request->password;
            $user->verified = 'DISABLED';
            $user->created_at = now();
            $user->update();

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => $user,
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

                $user = twUsuario::find($id);

                if (! $user) {
                    return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'No existe el usuario en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => NULL
                    ],
                    'time_execution' => microtime()
                        ], 404);
                    }
                    
                $user->delete();

                return response()->json([
                    'msg' => 'OK',
                    'success' => true,
                    'data' => $user,
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
