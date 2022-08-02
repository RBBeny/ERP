var Mostrar = function(cveVendedor){
    $('#cuentas_ventas').empty()
    console.log(cveVendedor);
    $.get('MostrarCuentas',{cveVendedor : cveVendedor},function(cuentas){ 
        $.each(cuentas,function(index,value){
            $('#cuentas_ventas').append(
            "<tr>"+
            "<td>"+index+"</td>"+
            "<td>"+value+"</td>"+"</tr>"
            );
            console.log(index);
            console.log(value);
         }) 
                  
     });
 }
