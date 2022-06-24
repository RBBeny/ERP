<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministradorController extends Controller
{
    //
    public function home(){
        return view('GerenteCobranza.homeGCobranza');
    }
}
