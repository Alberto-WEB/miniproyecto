<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twCorporativo extends Model
{
    use HasFactory;

    //relacion uno a muchos(inversa)
    public function usuario(){
        return $this->belongsTo('App\Models\twUsuario');
    }

    //relacion uno a muchos
    public function empresasCorporativo(){
        return $this->hasMany('App\Models\twEmpresasCorporativo');
    }

    //relacion muchos a muchos
    public function documento(){
        return $this->belongsToMany('App\Models\twDocumento');
    }

    //relacion uno a muchos
    public function contratosCorporativo(){
        return $this->hasMany('App\Models\twContratosCorporativo');
    }
}
