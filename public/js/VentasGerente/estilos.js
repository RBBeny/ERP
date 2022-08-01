var Mostrar = function(cveVendedor){
   var route = "/MostrarCuentas/"+cveVendedor;
    $.get(route,{cveVendedor : cveVendedor},function(cuentas){
        $.each(cuentas,function(index,value){
            $('#cuentas_ventas').append(
            "<td>"+value.cveContrato+"</td>"+
            "<td>"+value.cveSolicitud+"</td>"+
            "<td>"+value.nomCliente + value.apellidoPaternoCliente + value.apellidoMaternoCliente+"</td>"
            );
         }) 
                  
     });
 }
