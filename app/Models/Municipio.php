<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = "cMunicipio";
    
    public function Estado(){
        return $this->belongsTo('App\Estado','cveEstado');
    }
}
