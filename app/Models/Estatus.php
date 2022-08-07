<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estatus extends Model
{
    //cveEstatus, nomEstatus
    protected $table = "cEstatus";
    protected $primaryKey="cveEstatus";
    protected $fillable = ['nomEstatus'];
    public $timestamps=false;
}
