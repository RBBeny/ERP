<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitud extends Model
{
    //
    use HasFactory;
    protected $table = "tsolicitud";
    protected $primaryKey="cveSolicitud";
    protected $fillable = ['cveFormaPago','aportacionInicial','fechaSolicitud','cveContrato','bonificacion','comentarioPaquete','cveVendedor','cveCobrador'];
    public $timestamps=false;
public function Contrato(){
    return $this->belongsTo('App\Models\Contrato','cveContrato');
}
public function FormaPago(){
    return $this->belongsTo('App\Models\FormaPago','cveFormaPago');
}
public function Vendedor(){
    return $this->belongsTo('App\Models\Vendedor','cveVendedor');
}
}
