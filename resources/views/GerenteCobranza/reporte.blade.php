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
    @foreach($total as $tot)
    <h3>TOTAL DE INGRESOS:{{$tot->total}}$ PESOS</h3>
    <br>
    @endforeach
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
    
    
</body>
</html>