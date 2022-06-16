<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    //
    protected $table = "cColonia";
    //
    public function Municipio(){
        return $this->belongsTo('App\Municipio','cveMunicipio');
    }
}
