<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "tcliente";
    protected $primaryKey="cveCliente";
    protected $fillable = ['nomCliente','apellidoPaternoCliente','apellidoMaternoCliente',
    'cveEstadoCliente','cveMunicipioCliente','cveColoniaCliente','numeroExteriorCasaCliente','entreCallesCliente','referenciasCasaCliente',
    'cveMunicipioClienteCobro','cveColoniaClienteCobro','numeroExteriorCasaClienteCobro',
    'referenciasCasaClienteCobro','telefonoCliente',
    'telefonoDosCliente','estadoCivilCliente','fechaNacimientoCliente',
    'cveSolicitud','cveContrato'];
    //Relacion M:1
    public function estadoCliente(){
     return $this->belongsTo('App\Models\Estado','cveEstado');
    }
    public function municipioCliente(){
        return $this->belongsTo('App\\Models\Municipio','cveMunicipio');
       }
    public function coloniaCliente(){
        return $this->belongsTo('App\\Models\Colonia','cveColonia');
    }
    public function municipioClienteCobro(){
        return $this->belongsTo('App\\Models\Municipio','cveMunicipio');
       }
    public function coloniaClienteCobro(){
        return $this->belongsTo('App\Models\Colonia','cveColonia');
    }
    public function Solicitud(){
        return $this->belongsTo('App\Models\Solicitud','cveSolicitud'); 
    }
    public function Contrato(){
        return $this->belongsTo('App\Models\Contrato','cveContrato');
    }
}
