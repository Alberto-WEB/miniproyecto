<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twCorporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'S_NombreCorto',
        'S_NombreCompleto',
        'S_LogoURL',
        'S_DBName',
        'S_DBUsuario',
        'S_DBPassword',
        'A_Activo',
        'created_at',
        'updated_at',
        'tw_usuarios_id'
    ];

    //relacion uno a muchos(inversa)
    public function usuario(){
        return $this->belongsTo(twUsuario::class, 'tw_usuarios_id');
    }

    //relacion uno a muchos
    public function empresasCorporativo(){
        return $this->hasMany(twEmpresasCorporativo::class, 'id');
    }

    //relacion muchos a muchos
    public function documento(){
        return $this->belongsToMany(twDocumento::class);
    }

    //relacion uno a muchos
    public function contratosCorporativo(){
        return $this->hasMany(twContratosCorporativo::class, 'id');
    }

    //relacion uno a muchos
    public function contactosCorporativo(){
        return $this->hasMany(twContactosCorporativo::class, 'id');
    }
}
