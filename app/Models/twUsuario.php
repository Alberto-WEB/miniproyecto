<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class twUsuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    //protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'email',
        'S_Nombre',
        'S_Apellidos',
        'S_FotoPerfilUrl',
        'S_Activo',
        'password',
        'verification_token',
        'verified',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'verification_token',
    ];

    
    //relacion uno a muchos
    public function corporativo(){
        return $this->hasMany(twCorporativo::class, 'id');
    }

    public function sendPasswordResetNotification($token)
    {
        $url = 'http://miniproyecto.test/reset-password?token=' . $token;

        $this->notify(new ResetPasswordNotification($url));
    }

}
