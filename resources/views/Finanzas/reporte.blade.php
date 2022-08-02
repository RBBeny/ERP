<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style type="text/css">
    th, td {
      border: solid 1px #777;
      padding: 2px;
      margin: 2px;
      height: 30px;
      font-family: "Open Sans"; 
      sans-serif;
    }
    h1,h2,h3,h4,h5,h6 {
        font-family: "Open Sans", sans-serif;
    }
  </style>

</head>
<body>
    <center>
        <h1>REPORTE DE INGRESOS</h1>
    </center>
    <h4>DE {{$fechaInicio}} A {{$fechaFin}}</h4>
    <hr>
    <br>

    <h5>TOTAL DE PAGOS:${{$total}} PESOS</h5>
    <h5>TOTAL DE COMISION:${{$comision}} PESOS</h5>
    <h4>TOTAL DE FIDEICOMISO:${{$fideicomiso}} PESOS</h4>
    <br>
  
    <center>
        <table>
            <tr>
                <td style="width: 270px;background-color:black;color:white;" >COBRADOR</td>
                <td style="width: 100px;background-color:black;color:white;">TOTAL PAGOS</td>
                <td style="width: 100px;background-color:black;color:white;" >COMISION</td>
                <td style="width: 100px;background-color:black;color:white;">FIDEICOMISO</td>
            </tr>
            @foreach($registros as $registros)
                <tr>
                    <td>{{ $registros-> nombreCobrador}} {{ $registros-> apellidoPaternoCobrador}} {{ $registros-> apellidoMaternoCobrador}}</td>
                    <td>{{ $registros-> Cobrado}}</td>
                    <td>{{ $registros-> Comision}}</td>
                     <td>{{ $registros-> fideicomiso}}</td>
                </tr>
            @endforeach
        </table>
        
    </center>
    
    
</body>
</html>