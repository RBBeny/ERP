<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cobrador extends Model
{
    //cveEstatus, nomEstatus
    protected $table = "cEstatus";
    protected $primaryKey="cveEstatus";
    protected $fillable = ['nomEstatus'];
}
