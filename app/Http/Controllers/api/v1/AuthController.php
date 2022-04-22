<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    
    public function login(Request $request)
    {
        $data = $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (!auth()->attempt($data)) {
            return response()->json([
                'error_message' => 'Datos incorrectos'
        ], 422);
        }

        $token = auth()->user()->createToken('API Token')->accessToken;

        return response()->json([
            'user' => Auth::user(),
            'token_type' => 'Bearer',
            'access_token' => $token,
        ], 200);

    }
}
