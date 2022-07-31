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
    <h2>TOTAL DE INGRESOS:{{$total}}$ PESOS</h2>
    <br>
    <H3>Subtotales por cobrador</H3>
    <br>
    <center>
        <table>
            <tr>
                <td style="width: 400px;background-color:black;color:white;" >COBRADOR</td>
                <td style="width: 200px;background-color:black;color:white;">SUBTOTAL</td>
            </tr>
            @foreach($registros as $regis)
            <tr>
                <td>{{$regis->nombreCobrador}} {{$regis->apellidoPaternoCobrador}} {{$regis->apellidoMaternoCobrador}}</td>
                <td>{{$regis->Subtotal}} $</td>
            </tr>
            @endforeach
        </table>
        
    </center>
    <br>
    <h3>Cobros realizados por cada cobrador</h3>
    <br>
    <center>
        <table>
            <tr>
                <td style="width: 200px;background-color:black;color:white;" >COBRADOR</td>
                <td style="width: 200px;background-color:black;color:white;">CLIENTE</td>
                <td style="width: 100px;background-color:black;color:white;">ABONO</td>
                <td style="width: 100px;background-color:black;color:white;">FECHA</td>
            </tr>
            @foreach($detalle as $detalle)
            <tr>
                <td>{{$detalle->nombreCobrador}} {{$detalle->apellidoPaternoCobrador}} {{$detalle->apellidoMaternoCobrador}}</td>
                <td>{{$detalle->nomCliente}} {{$detalle->apellidoPaternoCliente}} {{$detalle->apellidoMaternoCliente}}</td>
                <td>{{$detalle->cantidadPago}}</td>
                <td>{{$detalle->fechaPago}}</td>
            </tr>
            @endforeach
        </table>
        
    </center>
</body>
</html>