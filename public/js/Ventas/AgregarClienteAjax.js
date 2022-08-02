function alertSucces(message){
    $('#alerts').append(
        
       
        '<div class="alert alert-success alert-dismissible fade show" role="alert">'+
        '<strong>Se agrego el registro correctamente!</strong> '+
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+ message+'</div>');
        $(window).scrollTop(0);   
}
function alertDanger(message){
    $('#alerts').append(
       
        '<div class="alert alert-danger alert-dismissible fade show" role="alert">'+
        '<strong>No se agrego el registro correctamente!</strong> '+
        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>'+ message+'</div>');
        $(window).scrollTop(0);   
}
$(document).ready(function(){
    $('#btnGuardarEstado').click(function(e){    
    e.preventDefault();
    var cveEstado = $('#nomEstado').val();
    var _token = $("input[name=_token]").val();
    console.log(cveEstado);
    $.ajax({
        type:"POST",
        url:'insertarEstado',
        data:{
            cveEstado:cveEstado,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego el estado");
            },
        error:function(res){
            alertDanger("No se agrego el estado")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});


const AgregarMunicipio = document.getElementById('AgregarMunicipio');
AgregarMunicipio.addEventListener('submit', (e) => {
    e.preventDefault();
    var cveEstado = $('#cveEstadoNew').val();
    var nomMunicipio = $('#nombreMunicipioNew').val();
    var _token = $("input[name=_token]").val();
    console.log(nomMunicipio);
    $.ajax({
        type:"POST",
        url:'insertarMunicipio',
        data:{
            cveEstado:cveEstado,
            nomMunicipio:nomMunicipio,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego el Municipio");
               AgregarMunicipio.reset();
            },
        error:function(res){
            alertDanger("No se agrego el Municipio")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});  
const AgregarColonia = document.getElementById('AgregarColonia');
AgregarColonia.addEventListener('submit', (e) => {
    e.preventDefault();   
    var cveMunicipio = $('#cveMunicipioColoniaNew').val();
    var nomColonia = $('#nomColoniaNew').val();
    var _token = $("input[name=_token]").val();
    console.log(cveMunicipio);
    $.ajax({
        type:"POST",
        url:'insertarColonia',
        data:{
            cveMunicipio:cveMunicipio,
            nomColonia:nomColonia,
            _token:_token
        },
        success:function(res){
               console.log('Se ha creado un registro correctamente');
               alertSucces("Se agrego la colonia");
               AgregarColonia.reset();
            },
        error:function(res){
            alertDanger("No se agrego la colonia")
            console.log("No se ha hecho el registro");
        }            
        
    });
   
}); 
$("#cveEstadoCliente").on('change',function(){
var cveEstado = $(this).val();
console.log(cveEstado);
if ($.trim(cveEstado)!=''){
$.get('consultarMunicipio',{cveEstado : cveEstado},function(municipios){
    console.log(municipios);
       $('#cveMunicipioCliente').empty();
       $('#cveMunicipioClienteCobro').empty();
       $('#cveMunicipioColoniaNew').empty();
      $('#cveMunicipioCliente').append("<option value=''> Municipios..</option>");

        $.each(municipios,function(index,value){
            $('#cveMunicipioCliente').append("<option value='"+index+"'>"+value+"</option>");
            $('#cveMunicipioClienteCobro').append("<option value='"+index+"'>"+value+"</option>");
        })
        $.each(municipios,function(index,value){
            $('#cveMunicipioColoniaNew').append("<option value='"+index+"'>"+value+"</option>");
        })
        }           
);
}
});

$("#cveMunicipioCliente").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#cveColoniaCliente').empty();
        $('#cveColoniaCliente').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#cveColoniaCliente').append("<option value='"+index+"'>"+value+"</option>");
        })
        }           
);
}
});

$("#cveMunicipioClienteCobro").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#cveColoniaClienteCobro').empty();
        $('#cveColoniaClienteCobro').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#cveColoniaClienteCobro').append("<option value='"+index+"'>"+value+"</option>");
            
        })
        }           
);
}
});

$("#cvePaquete").on('change',function(){
var cvePaquete = $(this).val();
console.log(cvePaquete);
if ($.trim(cvePaquete)!=''){
$.get('consultarPaquete',{cvePaquete : cvePaquete},function(paquetes){
       $('#precio').empty();
       $.each(paquetes,function(cvePaquete,costoPaquete){
        $('#precio').val(costoPaquete);
        console.log(costoPaquete);
        }) 
                 
    });
}
});
$("#noSolicitud").on('change',function(){
    var noSolicitud = $("#noSolicitud").val();
    $('#nSolicitudRe').val(noSolicitud);
});
$("#noContrato").on('change',function(){
    var noContrato = $("#noContrato").val();
    console.log(noContrato);
    $('#nContratoRe').val(noContrato);
});

});