<?php

namespace App\Services;
use App\Models\Estado;

class Estados{
    public function get(){
        $estados = Estado::get();
        $estadosArray['']="Estados....";
        foreach($estados as $estado){
            $estadosArray[$estado->cveEstado]=$estado->nomEstado;
        }
        return $estadosArray;
    }
}