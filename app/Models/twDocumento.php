<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twDocumento extends Model
{
    use HasFactory;

    protected $fillable = [
        'S_Nombre',
        'N_Obligatorio',
        'S_Descripcion',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;

    //relacion de muchos a muchos
    public function corporativo(){
        return $this->belongsToMany(twCorporativo::class);
    }
}
