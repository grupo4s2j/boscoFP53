@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit entidadorganizativa
    </h1>
    <form method = 'get' action = '{!!url("entidadorganizativa")!!}'>
        <button class = 'btn btn-danger'>entidadorganizativa Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("entidadorganizativa")!!}/{!!$entidadorganizativa->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$entidadorganizativa->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="direccion">direccion</label>
            <input id="direccion" name = "direccion" type="text" class="form-control" value="{!!$entidadorganizativa->
            direccion!!}"> 
        </div>
        <div class="form-group">
            <label for="geolocalizacion">geolocalizacion</label>
            <input id="geolocalizacion" name = "geolocalizacion" type="text" class="form-control" value="{!!$entidadorganizativa->
            geolocalizacion!!}"> 
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control" value="{!!$entidadorganizativa->
            activo!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection