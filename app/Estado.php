<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    //
    protected $table = "cestado";
    protected $primaryKey="cveEstado";
    protected $fillable = ['nomEstado'];

    public $timestamps=false;
}
