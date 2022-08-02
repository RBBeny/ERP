<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormaPago extends Model
{
    //
    protected $table = "cformapago";
    protected $primaryKey="cveFormaPago";
    protected $fillable = ['nomFormaPago'];
    public $timestamps=false;
    
}
