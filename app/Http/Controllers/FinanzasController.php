<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Pago;
use App\Models\Cobrador;
use Illuminate\Support\Facades\DB;
use PDF;
use Carbon\Carbon;

class FinanzasController extends Controller
{
    public function homeFinanzas(){
        return view('Finanzas.homeFinanzas');
    }
    public function FinanzasIngresos(){
    
        $Ingresos= DB::table('tpago')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador',DB::raw('SUM(cantidadPago) as Cobrado'),DB::raw('SUM(cantidadPago)*comisionCobrador as Comision'),DB::raw('SUM(cantidadPago)-SUM(cantidadPago)*comisionCobrador as fideicomiso'))
        ->join('tcobrador','tcobrador.cveCobrador','=','tpago.cveCobrador')
        ->GroupBy('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador','comisionCobrador',)
        ->get(); 
        
        $total=0;
        $comision=0;
        $fideicomiso=0;

        foreach ($Ingresos as $Tot) {
            $total=$total+$Tot->Cobrado;
            $comision=$comision+$Tot->Comision;
            $fideicomiso=$fideicomiso+$Tot->fideicomiso;
        }
        $total=number_format($total, 2);
        $comision=number_format($comision, 2);
        $fideicomiso=number_format($fideicomiso, 2);

        return view('Finanzas.ingresos',['registros'=>$Ingresos,'total'=>$total,'comision'=>$comision,'fideicomiso'=>$fideicomiso]);
    }

    
    public function GenerarReporte($fechainicio,$fechafin){
    
        $Ingresos= DB::table('tpago')
        ->select('nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador',DB::raw('SUM(cantidadPago) as Cobrado'),DB::raw('SUM(cantidadPago)*comisionCobrador as Comision'),DB::raw('SUM(cantidadPago)-SUM(cantidadPago)*comisionCobrador as fideicomiso'))
        ->join('tcobrador','tcobrador.cveCobrador','=','tpago.cveCobrador')
        ->whereBetween('fechaPago',[$fechainicio,$fechafin])
        ->GroupBy('tcobrador.cveCobrador','nombreCobrador','apellidoPaternoCobrador','apellidoMaternoCobrador','comisionCobrador',)
        ->get(); 
        
        $total=0;
        $comision=0;
        $fideicomiso=0;

        foreach ($Ingresos as $Tot) {
            $total=$total+$Tot->Cobrado;
            $comision=$comision+$Tot->Comision;
            $fideicomiso=$fideicomiso+$Tot->fideicomiso;
        }
        $total=number_format($total, 2);
        $comision=number_format($comision, 2);
        $fideicomiso=number_format($fideicomiso, 2);

        
        if ($total>0) {
            $pdf=PDF::loadView('Finanzas.reporte',['registros'=>$Ingresos,'total'=>$total,'fechaInicio'=>$fechainicio,'fechaFin'=>$fechafin,'comision'=>$comision,'fideicomiso'=>$fideicomiso]);
            return $pdf->download('ReporteIngresos_'.$fechainicio.'-'.$fechafin.'.pdf');
        }
        return back();
    }

}