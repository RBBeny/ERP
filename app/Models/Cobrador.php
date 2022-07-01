<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    //
    protected $table = "tcobrador";
    protected $primaryKey="cveCobrador";
    protected $fillable = ['nombreCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador','comisionCobrador','cveEstatus'];
}
