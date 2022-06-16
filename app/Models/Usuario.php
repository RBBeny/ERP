<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = "tUsuario";
    
    public function TipoUsuario(){
        return $this->belongsTo('App\TipoUsuario','cveTipoUsuario');
    }
}
