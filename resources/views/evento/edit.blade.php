@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit evento
    </h1>
    <form method = 'get' action = '{!!url("evento")!!}'>
        <button class = 'btn btn-danger'>evento Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("evento")!!}/{!!$evento->
        id!!}/update' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="titulo">titulo</label>
            <input id="titulo" name = "titulo" type="text" class="form-control" value="{!!$evento->
            titulo!!}"> 
        </div>
        <div class="form-group">
            <label for="descripcion">descripcion</label>
            <input id="descripcion" name = "descripcion" type="text" class="form-control" value="{!!$evento->
            descripcion!!}"> 
        </div>
        <div class="form-group">
            <label for="img">img</label>
            <input id="img" name = "img" type="file" class="form-control" value="{!!$evento->
            img!!}"> 
        </div>
        <div class="form-group">
            <label for="fechaInicio">fechaInicio</label>
            <input id="fechaInicio" name = "fechaInicio" type="text" class="form-control" value="{!!$evento->
            fechaInicio!!}"> 
        </div>
        <div class="form-group">
            <label for="fechaFin">fechaFin</label>
            <input id="fechaFin" name = "fechaFin" type="text" class="form-control" value="{!!$evento->
            fechaFin!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection