const formulario = document.getElementById('Pagos');
var btnCerrar = document.getElementById('btn-cerrar');
btnCerrar.addEventListener('click', function() {
    formulario.reset();
});


$("#cveContrato").on('keyup',function(){
    var cveContrato = $(this).val();
    console.log(cveContrato);
    if ($.trim(cveContrato)!=''){
    $.get('consultarCliente',{cveContrato : cveContrato},function(paquetes){
           $('#cliente').empty();
           $.each(paquetes,function(cveContrato,Clientes){
            $('#cliente').val(Clientes);
            console.log(Clientes);
            }) 
                     
        });
    }
});