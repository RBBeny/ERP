@extends('layouts.plantilla')

@section('titulo','prueba')

@section('content')

@include('includes.navbarLogin')

<style>
    .containerOwnApp {
        box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);
        padding-top: 15px;
    }

    .login-page {
        padding: 18% 0 0;
        margin: 0 auto 100px;
        max-width: 360px;
        position: relative;
    }

    .login-form {
        box-shadow: 0 0 27px 0 rgba(84, 84, 84, 0.62);
    }

    .login-form-header {
        padding-top: 16px;
    }

    .login-from-row {
        padding-top: 16px;
        padding-bottom: 16px;
    }

    .login-form-font-header {
        font-size: 30px;
        font-weight: bold;
    }

    .login-form-font-header span {
        color: #007C9B;
    }
</style>

<br>
<br>
<br>
<div class="container">
    <div class="row text-center login-page">
        <div class="col-md-12 login-form">
            <form action="/login" method="POST">

                <div class="row">
                    <div class="col-md-12 login-form-header">
                        <p class="login-form-font-header"><span>Iniciar Sesión</span>
                        <p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login-from-row">
                        @csrf
                        <input name="nomUsuario" type="text" placeholder="Usuario" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login-from-row">
                        <input name="password" type="password" placeholder="Contraseña" required />
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 login-from-row">
                        <button type="submit" class="btn btn-info">Entrar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection