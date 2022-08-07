<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    protected $table = "tusuario";
    
    public function TipoUsuario(){
        return $this->belongsTo('App\TipoUsuario','cveTipoUsuario');
    }
}
