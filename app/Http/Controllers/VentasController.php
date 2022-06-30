<?php

namespace App\Http\Controllers;
use App\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class VentasController extends Controller
{
    //
    public function home(){
        return view('Ventas.homeVentas');
    }
     
    public function clientes(){
        return view('Ventas.clientesVentas');
    }

    public function agregarClientes(){
        return view('Ventas.agregarClientesVentas');
    }
    public function verCliente(){
        return view('Ventas.verClienteVentas');
    }

    public function insertarEstado(Request $request){
        error_log('LLego a la función');
        $Estado = new Estado();
        $Estado->nomEstado=$request->input('nomEstado');
        $Estado->save();
      

    // $cEstado = DB::insert('insert ');

    }
    public function mostrarEstadosAjax(Request $request){
       $Estado = DB::table('cEstado')
       ->select('nomEstado.*')
       ->get();
       return response(json_encode($Estado),200)->header('Content-type','text-plain');

    }


}
