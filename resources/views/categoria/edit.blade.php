@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit categoria
    </h1>
    <form method = 'get' action = '{!!url("categoria")!!}'>
        <button class = 'btn btn-danger'>categoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("categoria")!!}/{!!$categoria->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$categoria->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="color">color</label>
            <input id="color" name = "color" type="text" class="form-control" value="{!!$categoria->
            color!!}">
        </div>
        <div class="form-group">
            <label for="img">img</label>
            <input id="img" name = "img" type="text" class="form-control" value="{!!$categoria->
            img!!}">
        </div>
        <div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control" value="{!!$categoria->
            orden!!}">
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control" value="{!!$categoria->
            activo!!}">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection