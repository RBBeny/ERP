const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');
var cveEstadoCliente = document.getElementById('estado').value;
var campoNoSolicitud = document.getElementById('noSolicitud').value;
const expresiones={
    noSolicitud:/^\d{1,8}$/,
    noContrato:/^\d{1,8}$/,
nombreCliente:/^[a-zA-ZÀ-ÿ\s]{1,30}$/ ,
apellidoPaternoCliente:/^[a-zA-ZÀ-ÿ\s]{1,30}$/ ,
apellidoMaternoCliente: /^[a-zA-ZÀ-ÿ\s]{1,30}$/,
numeroTelefonoCliente:/^\d{10,11}$/ ,
numeroTelefonoDosCliente:/^\d{10,11}$/ ,
numeroTelefonoTresCliente:/^\d{10,11}$/ ,
estadoCivilCliente:/^[a-zA-ZÀ-ÿ]{1,12}$/,
cveEstadoCliente:/^\d{1,8}$/,
cveMunicipioCliente:/^\d{1,8}$/,
cveColoniaCliente:/^\d{1,8}$/,
calleCliente:/^[a-zA-Z0-9\s]{1,30}$/,
numeroExteriorCasaCliente:/^[0-9a-zA-Z]{1,10}$/,
numeroInteriorCasaCliente:/^[0-9a-zA-Z]{1,10}$/,
entreCallesCliente:/^[a-zA-Z0-9\s]{1,50}$/ ,
referenciasCasaCliente:/^[a-zA-Z\s]{1,50}$/ ,
cveMunicipioClienteCobro:/^\d{1,8}$/,
cveColoniaClienteCobro:/^\d{1,8}$/,
calleClienteCobro:/^[a-zA-Z0-9\s]{1,30}$/ ,
numeroExteriorCasaClienteCobro:/^[0-9a-zA-Z]{1,10}$/ ,
numeroInteriorCasaClienteCobro:/^[0-9a-zA-Z]{1,10}$/ ,
entreCallesClienteCobro:/^[a-zA-Z0-9\s]{1,50}$/ ,
referenciasCasaClienteCobro: /^[a-zA-Z0-9\s]{1,50}$/,
cvePaquete:/^\d{1,8}$/,
costoPaquete:/^(?!0\.00)[1-9]\d{0,2}(\d{3})*(\.\d\d)?$/ ,
extraPaquete:/^(?!0\.00)[1-9]\d{0,2}(\d{3})*(\.\d\d)?$/ ,
cveVendedor:/^\d{1,8}$/,
cveFormaPago:/^\d{1,8}$/,
cveCobrador:/^\d{1,8}$/,
bonificacion:/^(?!0\.00)[1-9]\d{0,2}(\d{3})*(\.\d\d)?$/ ,
inversionInicial: /^(?!0\.00)[1-9]\d{0,2}(,\d{3})*(\.\d\d)?$/
    
}
const campos={
noSolicitud : false,
noContrato: false,
nombreCliente: false,
apellidoPaternoCliente: false,
apellidoMaternoCliente: false,
numeroTelefonoCliente: false,      
numeroTelefonoDosCliente: true,
numeroTelefonoTresCliente: true,
estadoCivilCliente: true,
fechaNacimientoCliente: true,
cveEstadoCliente: false,
cveMunicipioCliente: false,
cveColoniaCliente: false,
calleCliente: false,
numeroExteriorCasaCliente: false,
numeroInteriorCasaCliente: true,
entreCallesCliente: true,
referenciasCasaCliente: true,
cveMunicipioClienteCobro: true,
cveColoniaClienteCobro: true,
calleClienteCobro: true,
numeroExteriorCasaClienteCobro: true,
numeroInteriorCasaClienteCobro: true,
entreCallesClienteCobro: true,
referenciasCasaClienteCobro: true,
cvePaquete: false,
costoPaquete: true,
extraPaquete: true,
cveVendedor: false,
fechaSolicitud: true,
cveFormaPago: false,
cveCobrador: false,
bonificacion: true,
inversionInicial: true
}

const validarFormulario = (e) =>{
switch(e.target.name){
case "noSolicitud":
    if (e.target != null){
ValidarCampo(expresiones.noSolicitud,e.target,'noSolicitud');
}
break;
case "noContrato":
    ValidarCampo(expresiones.noContrato,e.target,'noContrato');
break;
case "nombreCliente":
    ValidarCampo(expresiones.nombreCliente,e.target,'nombreCliente');
break;
case "apellidoPaternoCliente":
    ValidarCampo(expresiones.apellidoPaternoCliente,e.target,'apellidoPaternoCliente');
break;
case "apellidoMaternoCliente":
    ValidarCampo(expresiones.apellidoMaternoCliente,e.target,'apellidoMaternoCliente');
break;
case "numeroTelefonoCliente":
    ValidarCampo(expresiones.numeroTelefonoCliente,e.target,'numeroTelefonoCliente');
break;
case "numeroTelefonoDosCliente":
    ValidarCampoNull(expresiones.numeroTelefonoDosCliente,e.target,'numeroTelefonoDosCliente');
break;
case "numeroTelefonoTresCliente":
    ValidarCampoNull(expresiones.numeroTelefonoTresCliente,e.target,'numeroTelefonoTresCliente');
break;
case "estadoCivilCliente":
    ValidarCampoNull(expresiones.estadoCivilCliente,e.target,'estadoCivilCliente');
break;
case "cveEstadoCliente":
    ValidarCampoSelect(expresiones.cveEstadoCliente,e.target,'cveEstadoCliente');
break;
case "cveMunicipioCliente":
    ValidarCampoSelect(expresiones.cveMunicipioCliente,e.target,'cveMunicipioCliente');
break;
case "cveColoniaCliente":
    ValidarCampoSelect(expresiones.cveColoniaCliente,e.target,'cveColoniaCliente');
break;
case "calleCliente":
    ValidarCampo(expresiones.calleCliente,e.target,'calleCliente');
break;
case "numeroExteriorCasaCliente":
    ValidarCampo(expresiones.numeroExteriorCasaCliente,e.target,'numeroExteriorCasaCliente');
break;
case "numeroInteriorCasaCliente":
    ValidarCampoNull(expresiones.numeroInteriorCasaCliente,e.target,'numeroInteriorCasaCliente');
break;
case "entreCallesCliente":
    ValidarCampoNull(expresiones.entreCallesCliente,e.target,'entreCallesCliente');
break;
case "referenciasCasaCliente":
    ValidarCampoNull(expresiones.referenciasCasaCliente,e.target,'referenciasCasaCliente');
break;
case "numeroInteriorCasaCliente":
    ValidarCampoNull(expresiones.numeroInteriorCasaCliente,e.target,'numeroInteriorCasaCliente');
break;
case "cveMunicipioClienteCobro":
    ValidarCampoNull(expresiones.cveMunicipioClienteCobro,e.target,'cveMunicipioClienteCobro');
break;
case "cveColoniaClienteCobro":
    ValidarCampoNull(expresiones.cveColoniaClienteCobro,e.target,'cveColoniaClienteCobro');
break;
case "calleClienteCobro":
    ValidarCampoNull(expresiones.calleClienteCobro,e.target,'calleClienteCobro');
break;
case "numeroExteriorCasaClienteCobro":
    ValidarCampoNull(expresiones.numeroExteriorCasaClienteCobro,e.target,'numeroExteriorCasaClienteCobro');
break;
case "numeroInteriorCasaClienteCobro":
    ValidarCampoNull(expresiones.numeroInteriorCasaClienteCobro,e.target,'numeroInteriorCasaClienteCobro');
break;
case "entreCallesClienteCobro":
    ValidarCampoNull(expresiones.entreCallesClienteCobro,e.target,'entreCallesClienteCobro');
break;
case "referenciasCasaClienteCobro":
    ValidarCampoNull(expresiones.referenciasCasaClienteCobro,e.target,'referenciasCasaClienteCobro');
break;
case "cvePaquete":
    ValidarCampoSelect(expresiones.cvePaquete,e.target,'cvePaquete');
break;
case "costoPaquete":
    ValidarCampo(expresiones.costoPaquete,e.target,'costoPaquete');
break;
case "extraPaquete":
    ValidarCampoNull(expresiones.extraPaquete,e.target,'extraPaquete');
break;
case "cveVendedor":
    ValidarCampoSelect(expresiones.cveVendedor,e.target,'cveVendedor');
break;
case "cveFormaPago":
    ValidarCampoSelect(expresiones.cveFormaPago,e.target,'cveFormaPago');
break;
case "cveCobrador":
    ValidarCampoSelect(expresiones.cveCobrador,e.target,'cveCobrador');
break;
case "bonificacion":
    ValidarCampoNull(expresiones.bonificacion,e.target,'bonificacion');
break;
case "inversionInicial":
    ValidarCampoNull(expresiones.inversionInicial,e.target,'inversionInicial');
break;
}
}

const ValidarCampoSelect = (expresion,select,campo) =>{
    
    if(expresion.test(select.value)){
        campos[campo]=true;
        }else{
          
        campos[campo]=false;
       
        }
    }
    const ValidarCampoNull = (expresion,input,campo) =>{
    
        if(expresion.test(input.value)){
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo]=true;
            }else{
                
                document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
                document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
                document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
            campos[campo]=false;
            if( input.value == null || input.value.length == 0 || /^\s+$/.test(input.value) ) {
                document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
                document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
                document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
                campos[campo]=true;  
            }
            }
        }
const ValidarCampo = (expresion,input,campo) =>{
    
    if(expresion.test(input.value)){
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo]=true;
        }else{
            
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
            document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo]=false;
        if( input.value == null || input.value.length == 0 || /^\s+$/.test(input.value) ) {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
          }
        }
    }

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	/*input.addEventListener('blur', validarFormulario);*/
    input.addEventListener('change', validarFormulario);
});

selects.forEach((select) => {
	select.addEventListener('keyup', validarFormulario);
	/*input.addEventListener('blur', validarFormulario);*/
    select.addEventListener('change', validarFormulario);
});

formulario.addEventListener('submit',(e)=>{
e.preventDefault();
console.log("noSolicitud: "+campos.noSolicitud);
console.log("noContrato: "+campos.noContrato);
console.log("nombreCliente: "+campos.nombreCliente);
console.log("apellidoPaternoCliente: "+campos.apellidoPaternoCliente);
console.log("apellidoMaternoCliente: "+campos.apellidoMaternoCliente);
console.log("numeroTelefonoCliente: "+campos.numeroTelefonoCliente);
console.log("numeroTelefonoDosCliente: "+campos.numeroTelefonoDosCliente);
console.log("estadoCivilCliente: "+campos.estadoCivilCliente);
console.log("fechaNacimientoCliente: "+campos.fechaNacimientoCliente);
console.log("cveEstadoCliente: "+campos.cveEstadoCliente);
console.log("cveMunicipioCliente: "+campos.cveMunicipioCliente);
console.log("cveColoniaCliente: "+campos.cveColoniaCliente);
console.log("cveMunicipioCliente: "+campos.cveMunicipioCliente);
console.log("calleCliente: "+campos.calleCliente);
console.log("numeroExteriorCasaCliente: "+campos.numeroExteriorCasaCliente);
console.log("numeroInteriorCasaCliente: "+campos.numeroInteriorCasaCliente);
console.log("entreCallesCliente: "+campos.entreCallesCliente);
console.log("referenciasCasaCliente: "+campos.referenciasCasaCliente);
console.log("cveMunicipioClienteCobro: "+campos.cveMunicipioClienteCobro);
console.log("cveColoniaClienteCobro: "+campos.cveColoniaClienteCobro);
console.log("calleClienteCobro: "+campos.calleClienteCobro);
console.log("numeroExteriorCasaClienteCobro: "+campos.numeroExteriorCasaClienteCobro);
console.log("numeroInteriorCasaClienteCobro: "+campos.numeroInteriorCasaClienteCobro);
console.log("entreCallesClienteCobro: "+campos.entreCallesClienteCobro);
console.log("referenciasCasaClienteCobro: "+campos.referenciasCasaClienteCobro);
console.log("cvePaquete: "+campos.cvePaquete);
console.log("costoPaquete: "+campos.costoPaquete);
console.log("extraPaquete: "+campos.extraPaquete);
console.log("cveVendedor: "+campos.cveVendedor);
console.log("fechaSolicitud: "+campos.fechaSolicitud);
console.log("cveFormaPago: "+campos.cveFormaPago);
console.log("cveCobrador: "+campos.cveCobrador);
console.log("bonificacion: "+campos.bonificacion);
console.log("inversionInicial: "+campos.inversionInicial);
if(campos.noSolicitud && campos.noContrato && campos.nombreCliente && campos.apellidoPaternoCliente && campos.apellidoMaternoCliente && campos.numeroTelefonoCliente
    && campos.numeroTelefonoDosCliente && campos.estadoCivilCliente && campos.fechaNacimientoCliente && campos.cveEstadoCliente && campos.cveMunicipioCliente
    && campos.cveColoniaCliente && campos.calleCliente && campos.numeroExteriorCasaCliente && campos.numeroInteriorCasaCliente && campos.entreCallesCliente
    && campos.referenciasCasaCliente && campos.cveMunicipioClienteCobro && campos.cveColoniaClienteCobro && campos.calleClienteCobro && campos.numeroExteriorCasaClienteCobro
    && campos.numeroInteriorCasaClienteCobro && campos.entreCallesClienteCobro && campos.referenciasCasaClienteCobro && campos.cvePaquete
    && campos.costoPaquete  && campos.extraPaquete  && campos.cveVendedor  && campos.fechaSolicitud  && campos.cveFormaPago
    && campos.cveCobrador  && campos.bonificacion  && campos.inversionInicial 
    ){
    formulario.reset();

    document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
    setTimeout(() => {
        document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
    }, 5000);

    document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
        icono.classList.remove('formulario__grupo-correcto');
    });
} else {
    document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
}
});

//<script src="{{ asset('js/Ventas/AgregarClienteValidaciones.js') }}" charset="utf8" type="text/javascript"></script>
       