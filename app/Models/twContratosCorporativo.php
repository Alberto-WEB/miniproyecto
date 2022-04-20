<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twContratosCorporativo extends Model
{
    use HasFactory;

    //relacion uno a muchos(inversa)
    public function corporativo(){
        return $this->belongsTo('App\Models\twCorporativo');
    }
}
