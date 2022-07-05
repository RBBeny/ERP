<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = "cmunicipio";
    protected $primaryKey="cveMunicipio";
    protected $fillable = ['nomMunicipio','cveEstado'];
    public $timestamps=false;
    public function Estado(){
        return $this->belongsTo('App\Models\Estado','cveEstado');
    }
}
