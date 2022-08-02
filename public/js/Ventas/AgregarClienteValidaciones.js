const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');
const selects = document.querySelectorAll('#formulario select');
//var cveEstadoCliente = document.getElementById('estado').value;

var campoNoSolicitud = document.getElementById('noSolicitud').value;
const expresiones = {
    noSolicitud: /^\d{1,8}$/,
    noContrato: /^\d{1,8}$/,
    nombreCliente: /^[a-zA-ZÀ-ÿ\s]{1,30}$/,
    apellidoPaternoCliente: /^[a-zA-ZÀ-ÿ\s]{1,30}$/,
    apellidoMaternoCliente: /^[a-zA-ZÀ-ÿ\s]{1,30}$/,
    numeroTelefonoCliente: /^\d{10,11}$/,
    numeroTelefonoDosCliente: /^\d{10,11}$/,
    numeroTelefonoTresCliente: /^\d{10,11}$/,
    estadoCivilCliente: /^[a-zA-ZÀ-ÿ]{1,12}$/,
    cveEstadoCliente: /^\d{1,8}$/,
    cveMunicipioCliente: /^\d{1,8}$/,
    cveColoniaCliente: /^\d{1,8}$/,
    calleCliente: /^[a-zA-Z0-9\s]{1,30}$/,
    numeroExteriorCasaCliente: /^[0-9a-zA-Z]{1,10}$/,
    numeroInteriorCasaCliente: /^[0-9a-zA-Z]{1,10}$/,
    entreCallesCliente: /^[a-zA-Z0-9\s]{1,50}$/,
    referenciasCasaCliente: /^[a-zA-Z\s]{1,50}$/,
    cveMunicipioClienteCobro: /^\d{1,8}$/,
    cveColoniaClienteCobro: /^\d{1,8}$/,
    calleClienteCobro: /^[a-zA-Z0-9\s]{1,30}$/,
    numeroExteriorCasaClienteCobro: /^[0-9a-zA-Z]{1,10}$/,
    numeroInteriorCasaClienteCobro: /^[0-9a-zA-Z]{1,10}$/,
    entreCallesClienteCobro: /^[a-zA-Z0-9\s]{1,50}$/,
    referenciasCasaClienteCobro: /^[a-zA-Z0-9\s]{1,50}$/,
    cvePaquete: /^\d{1,8}$/,
    costoPaquete: /^(?!0\.00)[1-9]\d{0,2}(\d{3})*(\.\d\d)?$/,
    extraPaquete: /^\d{1,8}$/,
    cveVendedor: /^\d{1,8}$/,
    cveFormaPago: /^\d{1,8}$/,
    cveCobrador: /^\d{1,8}$/,
    bonificacion: /^\d{1,8}$/,
    inversionInicial: /^\d{1,8}$/

}
const campos = {
    noSolicitud: false,
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
    costoPaquete:true,
    extraPaquete: true,
    cveVendedor: false,
    fechaSolicitud: false,
    cveFormaPago: false,
    cveCobrador: false,
    bonificacion: true,
    inversionInicial: true
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "noSolicitud":
           
            ValidarCampoExistencia(expresiones.noSolicitud, e.target, 'noSolicitud');
            
            break;
        case "noContrato":
            ValidarCampoExistencia(expresiones.noContrato, e.target, 'noContrato');
            break;
        case "nombreCliente":
            ValidarCampoExistencia(expresiones.nombreCliente, e.target, 'nombreCliente');
            break;
        case "apellidoPaternoCliente":
            ValidarCampoExistencia(expresiones.apellidoPaternoCliente, e.target, 'apellidoPaternoCliente');
            break;
        case "apellidoMaternoCliente":
            ValidarCampoExistencia(expresiones.apellidoMaternoCliente, e.target, 'apellidoMaternoCliente');
            break;
        case "numeroTelefonoCliente":
            ValidarCampoExistencia(expresiones.numeroTelefonoCliente, e.target, 'numeroTelefonoCliente');
            break;
        case "numeroTelefonoDosCliente":
            ValidarCampoNull(expresiones.numeroTelefonoDosCliente, e.target, 'numeroTelefonoDosCliente');
            break;
        case "numeroTelefonoTresCliente":
            ValidarCampoNull(expresiones.numeroTelefonoTresCliente, e.target, 'numeroTelefonoTresCliente');
            break;
        case "estadoCivilCliente":
            ValidarCampoNull(expresiones.estadoCivilCliente, e.target, 'estadoCivilCliente');
            break;
        case "cveEstadoCliente":
            ValidarCampoSelect(expresiones.cveEstadoCliente, e.target, 'cveEstadoCliente');
            break;
        case "cveMunicipioCliente":
            ValidarCampoSelect(expresiones.cveMunicipioCliente, e.target, 'cveMunicipioCliente');
            break;
        case "cveColoniaCliente":
            ValidarCampoSelect(expresiones.cveColoniaCliente, e.target, 'cveColoniaCliente');
            break;
        case "calleCliente":
            ValidarCampoExistencia(expresiones.calleCliente, e.target, 'calleCliente');
            break;
        case "numeroExteriorCasaCliente":
            ValidarCampoExistencia(expresiones.numeroExteriorCasaCliente, e.target, 'numeroExteriorCasaCliente');
            break;
        case "numeroInteriorCasaCliente":
            ValidarCampoNull(expresiones.numeroInteriorCasaCliente, e.target, 'numeroInteriorCasaCliente');
            break;
        case "entreCallesCliente":
            ValidarCampoNull(expresiones.entreCallesCliente, e.target, 'entreCallesCliente');
            break;
        case "referenciasCasaCliente":
            ValidarCampoNull(expresiones.referenciasCasaCliente, e.target, 'referenciasCasaCliente');
            break;
        case "numeroInteriorCasaCliente":
            ValidarCampoNull(expresiones.numeroInteriorCasaCliente, e.target, 'numeroInteriorCasaCliente');
            break;
        case "cveMunicipioClienteCobro":
            ValidarCampoSelectNull(expresiones.cveMunicipioClienteCobro, e.target, 'cveMunicipioClienteCobro');
            break;
        case "cveColoniaClienteCobro":
            ValidarCampoSelectNull(expresiones.cveColoniaClienteCobro, e.target, 'cveColoniaClienteCobro');
            break;
        case "calleClienteCobro":
            ValidarCampoNull(expresiones.calleClienteCobro, e.target, 'calleClienteCobro');
            break;
        case "numeroExteriorCasaClienteCobro":
            ValidarCampoNull(expresiones.numeroExteriorCasaClienteCobro, e.target, 'numeroExteriorCasaClienteCobro');
            break;
        case "numeroInteriorCasaClienteCobro":
            ValidarCampoNull(expresiones.numeroInteriorCasaClienteCobro, e.target, 'numeroInteriorCasaClienteCobro');
            break;
        case "entreCallesClienteCobro":
            ValidarCampoNull(expresiones.entreCallesClienteCobro, e.target, 'entreCallesClienteCobro');
            break;
        case "referenciasCasaClienteCobro":
            ValidarCampoNull(expresiones.referenciasCasaClienteCobro, e.target, 'referenciasCasaClienteCobro');
            break;
        case "cvePaquete":
            ValidarCampoSelect(expresiones.cvePaquete, e.target, 'cvePaquete');
            break;
            case "costoPaquete":
                ValidarCampoNull(expresiones.cvePaquete, e.target, 'cvePaquete');
                break;
        case "extraPaquete":
            ValidarCampoNull(expresiones.extraPaquete, e.target, 'extraPaquete');
            break;
        case "cveVendedor":
            ValidarCampoSelect(expresiones.cveVendedor, e.target, 'cveVendedor');
            break;
        case "cveFormaPago":
            ValidarCampoSelect(expresiones.cveFormaPago, e.target, 'cveFormaPago');
            break;
        case "cveCobrador":
            ValidarCampoSelect(expresiones.cveCobrador, e.target, 'cveCobrador');
            break;
        case "bonificacion":
            ValidarCampoNull(expresiones.bonificacion, e.target, 'bonificacion');
            break;
        case "inversionInicial":
            ValidarCampoNull(expresiones.inversionInicial, e.target, 'inversionInicial');
            break;
    }
}

const ValidarCampoSelect = (expresion, select, campo) => {

    if (expresion.test(select.value)) {
        campos[campo] = true;
        document.getElementById(`${campo}`).classList.remove('select_text-incorrecto');
        document.getElementById(`${campo}`).classList.add('select_text-correcto');
       } else {
        document.getElementById(`${campo}`).classList.add('select_text-incorrecto');
        document.getElementById(`${campo}`).classList.remove('select_text-correcto');
        campos[campo] = false;

    }
}
const ValidarCampoSelectNull = (expresion, select, campo) => {

    if (expresion.test(select.value)) {
        campos[campo] = true;
        document.getElementById(`${campo}`).classList.remove('select_text-incorrecto');
        document.getElementById(`${campo}`).classList.add('select_text-correcto');
       } else {
        document.getElementById(`${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`${campo}`).classList.remove('formulario__grupo-correcto');
        campos[campo] = false;
        if (select.value == null || select.value.length == 0 || /^\s+$/.test(select.value)) {
           campos[campo] = true;
        }

    }
}
const ValidarCampoNull = (expresion, input, campo) => {

    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {

        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
        if (input.value == null || input.value.length == 0 || /^\s+$/.test(input.value)) {
            document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
            document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
            document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
            campos[campo] = true;
        }
    }
}
const ValidarCampoExistencia = (expresion, input, campo) => {

    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        document.querySelector(`#grupo__${campo} .formulario__input-error-required`).classList.remove('formulario__input-error-required-activo');
        campos[campo] = true;
    } else {

        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        document.querySelector(`#grupo__${campo} .formulario__input-error-required`).classList.add('formulario__input-error-required-activo');
        campos[campo] = false;
        if (input.value == null || input.value.length == 0 || /^\s+$/.test(input.value)) {
            document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        document.querySelector(`#grupo__${campo} .formulario__input-error-required`).classList.add('formulario__input-error-required-activo');
        campos[campo] = false;
    }
    }
}
const ValidarCampo = (expresion, input, campo) => {

    if (expresion.test(input.value)) {
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
        campos[campo] = true;
    } else {

        document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
        document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
        document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
        document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
        document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
        campos[campo] = false;
        if (input.value == null || input.value.length == 0 || /^\s+$/.test(input.value)) {
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

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    
    
    console.log("noSolicitud: " + campos.noSolicitud);
    console.log("noContrato: " + campos.noContrato);
    console.log("nombreCliente: " + campos.nombreCliente);
    console.log("apellidoPaternoCliente: " + campos.apellidoPaternoCliente);
    console.log("apellidoMaternoCliente: " + campos.apellidoMaternoCliente);
    console.log("numeroTelefonoCliente: " + campos.numeroTelefonoCliente);
    console.log("numeroTelefonoDosCliente: " + campos.numeroTelefonoDosCliente);
    console.log("numeroTelefonoTresCliente: " + campos.numeroTelefonoTresCliente);
    console.log("estadoCivilCliente: " + campos.estadoCivilCliente);
    console.log("fechaNacimientoCliente: " + campos.fechaNacimientoCliente);
    console.log("cveEstadoCliente: " + campos.cveEstadoCliente);
    console.log("cveMunicipioCliente: " + campos.cveMunicipioCliente);
    console.log("cveColoniaCliente: " + campos.cveColoniaCliente);
    console.log("calleCliente: " + campos.calleCliente);
    console.log("numeroExteriorCasaCliente: " + campos.numeroExteriorCasaCliente);
    console.log("numeroInteriorCasaCliente: " + campos.numeroInteriorCasaCliente);
    console.log("entreCallesCliente: " + campos.entreCallesCliente);
    console.log("referenciasCasaCliente: " + campos.referenciasCasaCliente);
    console.log("cveMunicipioClienteCobro: " + campos.cveMunicipioClienteCobro);
    console.log("cveColoniaClienteCobro: " + campos.cveColoniaClienteCobro);
    console.log("calleClienteCobro: " + campos.calleClienteCobro);
    console.log("numeroExteriorCasaClienteCobro: " + campos.numeroExteriorCasaClienteCobro);
    console.log("numeroInteriorCasaClienteCobro: " + campos.numeroInteriorCasaClienteCobro);
    console.log("entreCallesClienteCobro: " + campos.entreCallesClienteCobro);
    console.log("referenciasCasaClienteCobro: " + campos.referenciasCasaClienteCobro);
    console.log("cvePaquete: " + campos.cvePaquete);
    console.log("costoPaquete: " + campos.costoPaquete);
    console.log("extraPaquete: " + campos.extraPaquete);
    console.log("cveVendedor: " + campos.cveVendedor);
    console.log("fechaSolicitud: " + campos.fechaSolicitud);
    console.log("cveFormaPago: " + campos.cveFormaPago);
    console.log("cveCobrador: " + campos.cveCobrador);
    console.log("bonificacion: " + campos.bonificacion);
    console.log("inversionInicial: " + campos.inversionInicial);
    if (campos.noSolicitud && campos.noContrato && campos.nombreCliente && campos.apellidoPaternoCliente && campos.apellidoMaternoCliente && campos.numeroTelefonoCliente
        && campos.numeroTelefonoDosCliente && campos.estadoCivilCliente && campos.fechaNacimientoCliente && campos.cveEstadoCliente && campos.cveMunicipioCliente
        && campos.cveColoniaCliente && campos.calleCliente && campos.numeroExteriorCasaCliente && campos.numeroInteriorCasaCliente && campos.entreCallesCliente
        && campos.referenciasCasaCliente && campos.cveMunicipioClienteCobro && campos.cveColoniaClienteCobro && campos.calleClienteCobro && campos.numeroExteriorCasaClienteCobro
        && campos.numeroInteriorCasaClienteCobro && campos.entreCallesClienteCobro && campos.referenciasCasaClienteCobro && campos.cvePaquete
        &&  campos.extraPaquete && campos.cveVendedor && campos.fechaSolicitud && campos.cveFormaPago
        && campos.cveCobrador && campos.bonificacion && campos.inversionInicial && campos.costoPaquete
    ) {
        var cveSolicitud = document.getElementById('noSolicitud').value;
        var cveContrato = document.getElementById('noContrato').value;
        var nomCliente = document.getElementById('nombreCliente').value;
        var apellidoPaternoCliente = document.getElementById('apellidoPaternoCliente').value;
        var apellidoMaternoCliente = document.getElementById('apellidoMaternoCliente').value;
        var telefonoCliente = document.getElementById('numeroTelefonoCliente').value;
        var telefonoDosCliente = document.getElementById('numeroTelefonoDosCliente').value;
        var telefonoTresCliente = document.getElementById('numeroTelefonoTresCliente').value;
        var estadoCivilCliente = document.getElementById('estadoCivilCliente').value;
        var fechaNacimientoCliente = document.getElementById('fechaNacimientoCliente').value;
        var cveEstadoCliente = document.getElementById('cveEstadoCliente').value;
        var cveMunicipioCliente = document.getElementById('cveMunicipioCliente').value;
        var cveColoniaCliente = document.getElementById('cveColoniaCliente').value;
        var calleCliente = document.getElementById('calleCliente').value;
        var numeroExteriorCasaCliente = document.getElementById('numeroExteriorCasaCliente').value;
        var numeroInteriorCasaCliente = document.getElementById('numeroInteriorCasaCliente').value;
        var entreCallesCliente = document.getElementById('entreCallesCliente').value;
        var referenciasCasaCliente = document.getElementById('referenciasCasaCliente').value;
        var cveMunicipioClienteCobro = document.getElementById('cveMunicipioClienteCobro').value;
        var cveColoniaClienteCobro = document.getElementById('cveColoniaClienteCobro').value;
        var calleClienteCobro = document.getElementById('calleClienteCobro').value;
        var numeroExteriorCasaClienteCobro = document.getElementById('numeroExteriorCasaClienteCobro').value;
        var numeroInteriorCasaClienteCobro = document.getElementById('numeroInteriorCasaClienteCobro').value;
        var entreCallesClienteCobro = document.getElementById('entreCallesClienteCobro').value;
        var referenciasCasaClienteCobro = document.getElementById('referenciasCasaClienteCobro').value;
        var cvePaquete = document.getElementById('cvePaquete').value;
        var costoPaquete = document.getElementById('precio').value;
        var ExtraPaquete = document.getElementById('costoAdicional').value;
        var cveVendedor = document.getElementById('cveVendedor').value;
        var fechaSolicitud = document.getElementById('fechaSolicitud').value;   
        var cveFormaPago = document.getElementById('cveFormaPago').value;
        var cveCobrador = document.getElementById('cveCobrador').value;
        var bonificacion = document.getElementById('bonificacion').value;
        var aportacionInicial = document.getElementById('inversionInicial').value;
        var cveEstatusContrato = 5;
        var _token = $("input[name=_token]").val();
        if (ExtraPaquete == null || ExtraPaquete.length == 0 ){
            ExtraPaquete = 0.00;
        }
        if (bonificacion == null || bonificacion.length == 0){
            bonificacion = 0.00;
        }
        if (aportacionInicial == null || aportacionInicial.length == 0){
            aportacionInicial = 0.00;
        }
        var restantePaquete = ((costoPaquete+ExtraPaquete)-bonificacion)-aportacionInicial;
        var date = new Date();
        const formatDate  =(date)=>{
            let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) + "-" + date.getDate()
            return formatted_date;
        }
        console.log(formatDate(date));
        fechaEmision = formatDate(date);

       

        function formatoDate(fechaSolicitud) {
            var d = new Date(fechaSolicitud),
                month = '' + (d.getMonth() + 1),
                day = '' + d.getDate(),
                year = d.getFullYear();
        
            if (month.length < 2) 
                month = '0' + month;
            if (day.length < 2) 
                day = '0' + day;
        
            return [year, month, day].join('-');
        }
        console.log(formatoDate(fechaSolicitud));
        fechaSolicitud = formatoDate(fechaSolicitud);

        console.log("noSolicitud: " + cveSolicitud);
        console.log("noContrato: " + cveContrato);
        console.log("nomCliente: " + nomCliente);
        console.log("apellidoPaternoCliente: " + apellidoPaternoCliente);
        console.log("apellidoMaternoCliente: " + apellidoMaternoCliente);
        console.log("numeroTelefonoCliente: " + telefonoCliente);
        console.log("numeroTelefonoDosCliente: " + telefonoDosCliente);
        console.log("numeroTelefonoTresCliente: " + telefonoTresCliente);
        console.log("estadoCivilCliente: " + estadoCivilCliente);
        console.log("fechaNacimientoCliente: " + fechaNacimientoCliente);
        console.log("cveEstadoCliente: " + cveEstadoCliente);
        console.log("cveMunicipioCliente: " + cveMunicipioCliente);
        console.log("cveColoniaCliente: " + cveColoniaCliente);
        console.log("calleCliente: " + calleCliente);
        console.log("numeroExteriorCasaCliente: " + numeroExteriorCasaCliente);
        console.log("numeroInteriorCasaCliente: " + numeroInteriorCasaCliente);
        console.log("entreCallesCliente: " + entreCallesCliente);
        console.log("referenciasCasaCliente: " + referenciasCasaCliente);
        console.log("cveMunicipioClienteCobro: " + cveMunicipioClienteCobro);
        console.log("cveColoniaClienteCobro: " + cveColoniaClienteCobro);
        console.log("calleClienteCobro: " + calleClienteCobro);
        console.log("numeroExteriorCasaClienteCobro: " + numeroExteriorCasaClienteCobro);
        console.log("numeroInteriorCasaClienteCobro: " + numeroInteriorCasaClienteCobro);
        console.log("entreCallesClienteCobro: " + entreCallesClienteCobro);
        console.log("referenciasCasaClienteCobro: " + referenciasCasaClienteCobro);
        console.log("cvePaquete: " + cvePaquete);
       console.log("costoPaquete: " + costoPaquete);
        console.log("extraPaquete: " + ExtraPaquete);
        console.log("cveVendedor: " + cveVendedor);
        console.log("fechaSolicitud: " + fechaSolicitud);
        console.log("cveFormaPago: " + cveFormaPago);
        console.log("cveCobrador: " + cveCobrador);
        console.log("bonificacion: " + bonificacion);
        console.log("inversionInicial: " + aportacionInicial);
        console.log("restantePaquete: " + restantePaquete);
        console.log("cveEstatusContrato: "+ cveEstatusContrato);
        console.log("fechaEmision: "+fechaEmision);
        console.log("token: " + _token);
        $.ajax(
        {
            url: 'insertarCliente',type:"POST", 
            data:{
            cveSolicitud : cveSolicitud,
            cveContrato : cveContrato,
            nomCliente : nomCliente,
            apellidoPaternoCliente : apellidoPaternoCliente,
            apellidoMaternoCliente : apellidoMaternoCliente,
            telefonoCliente : telefonoCliente,
            telefonoDosCliente : telefonoDosCliente,
            telefonoTresCliente:telefonoTresCliente,
            estadoCivilCliente : estadoCivilCliente, 
            fechaNacimientoCliente : fechaNacimientoCliente, 
            cveEstadoCliente : cveEstadoCliente, 
            cveMunicipioCliente : cveMunicipioCliente,
            cveColoniaCliente : cveColoniaCliente,
            calleCliente: calleCliente,
            numeroExteriorCasaCliente : numeroExteriorCasaCliente,
            numeroInteriorCasaCliente : numeroInteriorCasaCliente, 
            entreCallesCliente : entreCallesCliente, 
            referenciasCasaCliente : referenciasCasaCliente,
            cveMunicipioClienteCobro : cveMunicipioClienteCobro,
            cveColoniaClienteCobro : cveColoniaClienteCobro, 
            calleClienteCobro : calleClienteCobro, 
            numeroExteriorCasaClienteCobro : numeroExteriorCasaClienteCobro, 
            numeroInteriorCasaClienteCobro : numeroInteriorCasaClienteCobro, 
            entreCallesClienteCobro : entreCallesClienteCobro,
            referenciasCasaClienteCobro : referenciasCasaClienteCobro,
            cvePaquete : cvePaquete,
            costoPaquete : costoPaquete,
            ExtraPaquete : ExtraPaquete, 
            cveVendedor : cveVendedor,
            fechaSolicitud : fechaSolicitud, 
            fechaEmision : fechaEmision,
            cveFormaPago : cveFormaPago, 
            cveCobrador : cveCobrador, 
            bonificacion : bonificacion,
            aportacionInicial : aportacionInicial,
            restantePaquete : restantePaquete,
            cveEstatusContrato : cveEstatusContrato,
            _token:_token
        },
        success:function(res){
            console.log('Se ha creado un registro correctamente');
    
            document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        formulario.reset();
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
        var cnp1 = document.getElementById("cnp1");
        var cnp2 = document.getElementById("cnp2");
        var cnp3 = document.getElementById("cnp3");
        var cnp4 = document.getElementById("cnp4");
        var progress = document.getElementById("progress");
        cnp1.style.display = "block";
        cnp2.style.display = "none";
        progress.style.width = "120px";
        cnp3.style.display = "none";
        cnp4.style.display = "none";
         },
     error:function(res){
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
         console.log("No se ha hecho el registro");
     } 

        } );

    } else {
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
    }
});

// <script src="{{ asset('js/Ventas/AgregarClienteValidaciones.js') }}" charset="utf8" type="text/javascript"></script>