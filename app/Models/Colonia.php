<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Colonia extends Model
{
    //
    protected $table = "ccolonia";
    protected $primaryKey="cveColonia";
    protected $fillable = ['nomColonia','cveMunicipio'];
    public $timestamps=false;
    //
    public function Municipio(){
        return $this->belongsTo('App\Models\Colonia','cveColonia');
    }
}
