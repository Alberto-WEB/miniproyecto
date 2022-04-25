<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twContratosCorporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'D_FechaInicio',
        'D_FechaFin',
        'S_URLContrato',
        'tw_corporativos_id',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;


    //relacion uno a muchos (inversa)
    public function corporativo(){
        return $this->belongsTo(twCorporativo::class, 'tw_corporativos_id');
    }
}
