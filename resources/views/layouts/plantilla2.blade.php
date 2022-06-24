<!DOCTYPE html>

<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>@yield('titulo')</title>
        <link href="{{ asset('css/plantilla.css') }}" rel="stylesheet" >      
        

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