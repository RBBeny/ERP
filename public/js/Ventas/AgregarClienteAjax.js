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
               $('#nomEstado')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego el estado")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});
$('#guardarMunicipio').click(function(e){    
    e.preventDefault();
    var cveEstado = $('#nombreEstadoNew').val();
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
               $('#nombreEstadoNew')[0].reset();
               $('#nombreMunicipioNew')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego el Municipio")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
});  
$('#guardarColonia').click(function(e){    
    e.preventDefault();
    var cveMunicipio = $('#municipioColoniaNew').val();
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
               $('#municipioColoniaNew')[0].reset();
               $('#nomColoniaNew')[0].reset();
              /* var html = '';
               $(res.estados).each(function(key,value){
                html =+ '<option>'+value.nomEstado+'<option>';

               });*/
            },
        error:function(res){
            alertDanger("No se agrego la colonia")
            console.log("No se ha hecho el registro");
        }            
        
    });
    return false;
}); 
$("#estado").on('change',function(){
var cveEstado = $(this).val();
console.log(cveEstado);
if ($.trim(cveEstado)!=''){
$.get('consultarMunicipio',{cveEstado : cveEstado},function(municipios){
    console.log(municipios);
       $('#municipio').empty();
      $('#municipio').append("<option value=''> Municipios..</option>");
       //$('#municipioCobro').append("<option value=''> Municipios..</option>");
       //$('#municipioColoniaNew').append("<option value=''> Municipios..</option>");
        $.each(municipios,function(index,value){
            $('#municipio').append("<option value='"+index+"'>"+value+"</option>");
            $('#municipioCobro').append("<option value='"+index+"'>"+value+"</option>");
        })
        $.each(municipios,function(index,value){
            $('#municipioColoniaNew').append("<option value='"+index+"'>"+value+"</option>");
        })
        }           
);
}
});

$("#municipio").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#colonia').empty();
        $('#colonia').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#colonia').append("<option value='"+index+"'>"+value+"</option>");
        })
        }           
);
}
});

$("#municipioCobro").on('change',function(){
var cveMunicipio = $(this).val();
console.log(cveMunicipio);
if ($.trim(cveMunicipio)!=''){
$.get('consultarColonia',{cveMunicipio : cveMunicipio},function(colonias){
       $('#coloniaCobro').empty();
        $('#coloniaCobro').append("<option value=''> Colonias..</option>");
        $.each(colonias,function(index,value){
            $('#coloniaCobro').append("<option value='"+index+"'>"+value+"</option>");
        })
        }           
);
}
});

$("#paquete").on('change',function(){
var cvePaquete = $("#paquete").val();
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