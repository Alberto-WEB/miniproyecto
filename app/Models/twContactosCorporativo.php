<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twContactosCorporativo extends Model
{
    use HasFactory;

     //relacion uno a muchos (inversa)
     public function empresasCorporativo(){
        return $this->belongsTo('App\Models\twEmpresasCorporativo');
    }

}
