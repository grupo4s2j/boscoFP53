@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit subcategoria
    </h1>
    <form method = 'get' action = '{!!url("subcategoria")!!}'>
        <button class = 'btn btn-danger'>subcategoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("subcategoria")!!}/{!!$subcategoria->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idCategoria">idCategoria</label>
            <input id="idCategoria" name = "idCategoria" type="text" class="form-control" value="{!!$subcategoria->
            idCategoria!!}"> 
        </div>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$subcategoria->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$subcategoria->
            orden!!}"> 
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control" value="{!!$subcategoria->
            activo!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection