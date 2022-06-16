<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    protected $table = "tContrato";

    //
    public function Paquete(){
        return $this->belongsTo('App\Paquete','cvePaquete');
    }
}
