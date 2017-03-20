@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create entidadorganizativa
    </h1>
    <form method = 'get' action = '{!!url("entidadorganizativa")!!}'>
        <button class = 'btn btn-danger'>entidadorganizativa Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("entidadorganizativa")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" required >
        </div>
        <div class="form-group">
            <label for="direccion">direccion</label>
            <input id="direccion" name = "direccion" type="text" class="form-control" required >
        </div>
        <div class="form-group">
            <label for="geolocalizacion">geolocalizacion</label>
            <input id="geolocalizacion" name = "geolocalizacion" type="text" class="form-control" required>
        </div>
       {{-- <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control">
        </div>--}}
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection