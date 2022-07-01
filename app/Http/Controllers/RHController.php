<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RHController extends Controller
{
    //
    public function homeRh(){
        return view('Rh.homeRh');
    }

    public function UsuariosRH(){
        return view('Rh.UsuariosRh');
    }

}