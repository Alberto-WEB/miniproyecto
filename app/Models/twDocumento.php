<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twDocumento extends Model
{
    use HasFactory;

    //relacion de muchos a muchos
    public function corporativo(){
        return $this->belongsToMany(twCorporativo::class);
    }
}
