<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twUsuario extends Model
{
    use HasFactory; 

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


    //relacion uno a muchos
    public function corporativo(){
        return $this->hasMany(twCorporativo::class, 'id');
    }
}
