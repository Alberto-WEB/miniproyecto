<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class twDocumentosCorporativo extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'tw_corporativos_id',
        'tw_documentos_id',
        'S_ArchivoUrl'
    ];

    const UPDATED_AT = null;
    const CREATED_AT = null;
    
    
  /*   //relacion uno a muchos (inversa)
    public function corporativo(){
        return $this->belongsTo(twCorporativo::class, 'tw_corporativos_id');
    } */
/* 
    //relacion uno a muchos (inversa)
    public function documento(){
        return $this->belongsTo(twDocumento::class, 'tw_documentos_id');
    } */

}
