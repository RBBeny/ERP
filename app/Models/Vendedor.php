<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    //
    protected $table = "tvendedor";
    protected $primaryKey="cveVendedor";
    protected $fillable = ['nombreVendedor','apellidoPaternoVendedor','apellidoMaternoVendedor','comisionVendedor','cveEstatus'];
    
}
