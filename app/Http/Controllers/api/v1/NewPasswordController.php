<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotRequest;
use App\Http\Requests\ResetRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Validation\ValidationException;

class NewPasswordController extends Controller
{
    public function forgotPassword(ForgotRequest $request){
        
        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
            
            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => 'Link para actualizar tu contraseña se envio con exito',
                'exeptions' => [
                    'msgError' => null
                ],
                'time_execution' => microtime()
            ], 200);

        }

        throw ValidationException::withMessages([
            'email' => [trans($status)]
        ]);
    }

    public function resetPassword(ResetRequest $request){
        
        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($request->password),
                    'verification_token' => Str::random(60),
                ])->save();

                event(new PasswordReset($user));
            }
        );

        if ($status == Password::PASSWORD_RESET) {
            
            return response()->json([
                'msg' => 'OK',
                'success' => true,
                'data' => 'La contraseña ha sido actualizada con exito',
                'exeptions' => [
                    'msgError' => __($status)
                ],
                'time_execution' => microtime()
            ], 200);
        }

        return response()->json([
            'msg' => 'BAD',
            'success' => false,
            'data' => [
                'msgError' => 'No existe el email o el token se vencio'
            ],
            'exeptions' => [
                'msgError' => __($status)
            ],
            'time_execution' => microtime()
    ], 500);
    }
}
