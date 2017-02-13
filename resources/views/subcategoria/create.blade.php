@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create subcategoria
    </h1>
    <form method = 'get' action = '{!!url("subcategoria")!!}'>
        <button class = 'btn btn-danger'>subcategoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("subcategoria")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idCategoria">idCategoria</label>
            <input id="idCategoria" name = "idCategoria" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection