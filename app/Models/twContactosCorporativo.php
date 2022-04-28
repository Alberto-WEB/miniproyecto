<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twContactosCorporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'S_Nombre',
        'S_Puesto',
        'S_Comentarios',
        'N_TelefonoFijo',
        'N_TelefonoMovil',
        'S_Email',
        'tw_corporativos_id',
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    //relacion uno a muchos (inversa)
    public function corporativo(){
        return $this->belongsTo(twCorporativo::class, 'tw_corporativos_id');
    }

}
