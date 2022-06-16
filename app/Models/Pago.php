<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    //
    protected $table = "tPago";
    
    public function Contrato(){
        return $this->belongsTo('App\Contrato','cveContrato');
    }

    public function Cobrador(){
        return $this->belongsTo('App\Cobrador','cveCobrador');
    }
}
