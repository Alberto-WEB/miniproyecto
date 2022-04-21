<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twEmpresasCorporativo extends Model
{
    use HasFactory;

    protected $fillable = [
        'tw_corporativos_id'
    ];

    
    //relacion uno a muchos (inversa)
    public function corporativo(){
        return $this->belongsTo(twCorporativo::class, 'tw_corporativos_id');
    }

    //relacion uno a muchos
    public function contactosCorporativo(){
        return $this->hasMany('App\Models\twContactosCorporativo');
    }
}
