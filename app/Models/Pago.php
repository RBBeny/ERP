<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //
    protected $table = "tpago";
    protected $primaryKey="cvePago";
    protected $fillable = ['fechaPago','cantidadPago','cveContrato','cveCobrador'];

    public $timestamps=false;

    public function Contrato(){
        return $this->belongsTo('App\Contrato','cveContrato');
    }

    public function Cobrador(){
        return $this->belongsTo('App\Cobrador','cveCobrador');
    }
