<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>@yield('titulo')</title>
        <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet" >      
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

        <meta name="robots" content="noindex">
        <meta name="googlebot" content="noindex">
    @yield('css')
    @yield('script')
    </head>
    <body>
    @yield('content')


    @yield('js')
 
    </body>
</html>