<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    //
    use HasFactory;
    protected $table = "tcontrato";
    protected $primaryKey="cveContrato";
    protected $fillable =['fechaEmision','cvePaquete','ExtraPaquete','totalPagado','restantePaquete','cveEstatusContrato'];
    //
    public function Paquete(){
        return $this->belongsTo('App\Models\Paquete','cvePaquete');
    }
}
