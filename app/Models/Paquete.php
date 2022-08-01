<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    //
    protected $table = "cpaquete";
    protected $primaryKey="cvePaquete";
    protected $fillable = ['nombrePaquete','costoPaquete','comentariosPaquete'];
    public $timestamps=false;
    
}
