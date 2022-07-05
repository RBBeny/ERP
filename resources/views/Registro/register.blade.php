@extends('layouts.plantilla')

@section('titulo','prueba')

@section('content')

@include('includes.navbar')
<br>
<br>
<br>

    <form action="/register" method="POST">
        @csrf
        <input type="text" name="nombreUsuario">
        <input type="text" name="apellidoPaternoUsuario">
        <input type="text" name="apellidoMaternoUsuario">
        <input type="text" name="nomUsuario">
        <input type="password" name="password">
        <input type="number" name="cveTipoUsuario">
        <input type="number" name="cveEstatus">

        <input type="submit" value="Registrar">
    </form>


    <div class="contenedor">
        <div class="contenedorStep">
            <div class="contenedorN3">
                <form>

                    <div class="form-group">
                        <!-- Full Name -->
                        <label for="full_name_id" class="control-label">Full Name</label>
                        <input type="text" class="form-control" id="full_name_id" name="full_name" placeholder="John Deer">
                    </div>

                    <div class="form-group">
                        <!-- Street 1 -->
                        <label for="street1_id" class="control-label">Street Address 1</label>
                        <input type="text" class="form-control" id="street1_id" name="street1" placeholder="Street address, P.O. box, company name, c/o">
                    </div>

                    <div class="form-group">
                        <!-- Street 2 -->
                        <label for="street2_id" class="control-label">Street Address 2</label>
                        <input type="text" class="form-control" id="street2_id" name="street2" placeholder="Apartment, suite, unit, building, floor, etc.">
                    </div>

                    <div class="form-group">
                        <!-- City-->
                        <label for="city_id" class="control-label">City</label>
                        <input type="text" class="form-control" id="city_id" name="city" placeholder="Smallville">
                    </div>

                    <div class="form-group">
                        <!-- State Button -->
                        <label for="state_id" class="control-label">State</label>
                        <select class="form-control" id="state_id">
                            <option value="AL">Alabama</option>
                            <option value="AK">Alaska</option>
                            <option value="AZ">Arizona</option>
                            <option value="AR">Arkansas</option>
                            <option value="CA">California</option>
                            <option value="CO">Colorado</option>
                            <option value="CT">Connecticut</option>
                            <option value="DE">Delaware</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <!-- Zip Code-->
                        <label for="zip_id" class="control-label">Zip Code</label>
                        <input type="text" class="form-control" id="zip_id" name="zip" placeholder="#####">
                    </div>

                    <div class="form-group">
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary">Buy!</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endsection