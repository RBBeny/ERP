<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
     //
     protected $table = "tpago";
     protected $primaryKey="cvePago";
     protected $fillable = ['fechaPago','cantidadPago','cveContrato','cveCobrador','cveEstatus'];
     public $timestamps=false;


}
