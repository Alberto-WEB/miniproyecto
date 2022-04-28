<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    
    public function login(LoginRequest $request)
    {
        try {
            if (!auth()->attempt($request->validated())) {
                return response()->json([
                    'msg' => 'BAD',
                    'success' => false,
                    'data' => [
                        'msgError' => 'email o password no coinciden en la DB'
                    ],
                    'exeptions' => [
                        'msgError' => null
                    ],
                    'time_execution' => microtime()
            ], 422);
            }

            $user = Auth::user();

            //dd($user);

            //add role as scope
            $userRole = $user->rol_usuario;
            //dd($userRole);

            $token = $user->createToken($user->email . ' ' . now(), [$userRole]);
            //dd($token);

            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => Auth::user(),
                'access_token' => $token->accessToken,
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
