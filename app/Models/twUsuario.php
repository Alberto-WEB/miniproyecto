<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twUsuario extends Model
{
    use HasFactory;

    //relacion uno a muchos
    public function corporativo(){
        return $this->hasMany('App\Models\twCorporativo');
    }
}
