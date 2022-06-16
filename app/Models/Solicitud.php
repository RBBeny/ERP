<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    protected $table = "tSolicitud";

public function Contrato(){
    return $this->belongsTo('App\Contrato','cveContrato');
}
public function FormaPago(){
    return $this->belongsTo('App\FormaPago','cveFormaPago');
}
public function Vendedor(){
    return $this->belongsTo('App\Vendedor','cveVendedor');
}
}
