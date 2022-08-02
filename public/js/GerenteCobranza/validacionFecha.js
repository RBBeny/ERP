const formulario= document.getElementById('formulario');
const inputs= document.querySelectorAll('#formulario input');

let date = new Date()
 let day = `${(date.getDate())}`.padStart(2,'0');
 let month = `${(date.getMonth()+1)}`.padStart(2,'0');
 let year = date.getFullYear();
 
var actual=`${year}-${month}-${day}`;
var minDate, maxDate;

const campos ={
    fechaHasta:false,
    fechaDesde:false
}

const validarFechas=(e)=>{
    switch (e.target.name){
        case "fechaDesde":
            var fechaHasta=(document.getElementById("fechaHasta").value);
            
            if(e.target.value<actual && fechaHasta=="" || e.target.value<actual && fechaHasta>e.target.value){
                document.getElementById("fechaDesde").classList.remove('form-control-error');
                document.getElementById("fechaDesde").classList.add('form-control-correcta');
                document.querySelector('#grupo_fechaDesde .fecha_error').classList.remove('fecha_error-activo');
                campos.fechaDesde=true;
            }else{
                document.getElementById("fechaDesde").classList.add('form-control-error');
                document.getElementById("fechaDesde").classList.remove('form-control-correcta');
                document.querySelector('#grupo_fechaDesde .fecha_error').classList.add('fecha_error-activo');
                campos.fechaDesde=false;
            }

        break;

        case "fechaHasta":
            var fechaDesde=(document.getElementById("fechaDesde").value);

            if(e.target.value<=actual && e.target.value>fechaDesde){
                document.getElementById("fechaHasta").classList.remove('form-control-error');
                document.getElementById("fechaHasta").classList.add('form-control-correcta');
                document.querySelector('#grupo_fechaHasta .fecha_error').classList.remove('fecha_error-activo');
                campos.fechaHasta=true;
            }else{
                document.getElementById("fechaHasta").classList.add('form-control-error');
                document.getElementById("fechaHasta").classList.remove('form-control-correcta');
                document.querySelector('#grupo_fechaHasta .fecha_error').classList.add('fecha_error-activo');
                campos.fechaHasta=false;
            }
        break;
    }
}

inputs.forEach((input) => {
    input.addEventListener('change',validarFechas);
    input.addEventListener('blur',validarFechas);
});



formulario.addEventListener('submit',(e)=>{
    e.preventDefault();
    if(campos.fechaHasta && campos.fechaDesde){
        $.fn.dataTable.ext.search.push(
            function( oSettings, aData, iDataIndex) {
        
                var dateIni = $('#fechaDesde').val();
                var dateFin = $('#fechaHasta').val();

                var indexCol = 5;
        
                dateIni = dateIni.replace(/-/g, "");
                dateFin= dateFin.replace(/-/g, "");
        
                var dateCol = aData[indexCol].replace(/-/g, "");
        
                if (dateIni === "" && dateFin === "")
                {
                    return true;
                }
        
                if(dateIni === "")
                {
                    return dateCol <= dateFin;
                }
        
                if(dateFin === "")
                {
                    return dateCol >= dateIni;
                }
        
                return dateCol >= dateIni && dateCol <= dateFin;
               
            }
        );
        $(document).ready(function() {
            $(document).ready(function() {  
            var table = $('#clienteVentas').DataTable();
            table.draw();
            });
    
        }); 
        alertify.success("Filtro ejecutado.");
    }
    else{
       alertify.error('Datos fallidos');
    }
});

function reporteI(){
    block();
    if(campos.fechaHasta && campos.fechaDesde){
        var dateIni = $('#fechaDesde').val();
        var dateFin = $('#fechaHasta').val();
        window.location.href=('Reporte/'+dateIni+'/'+dateFin);
        unBlock();
    }else{
        alertify.error("Error en el las fechas");
        unBlock();
    }
}

function reporteIdetallado(){
    block();
    if(campos.fechaHasta && campos.fechaDesde){
        var dateIni = $('#fechaDesde').val();
        var dateFin = $('#fechaHasta').val();
        window.location.href=('ReporteDetallado/'+dateIni+'/'+dateFin);
        unBlock();
    }else{
        alertify.error("Error en el las fechas");
        unBlock();
    }
}
