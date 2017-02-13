@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create categoria
    </h1>
    <form method = 'get' action = '{!!url("categoria")!!}'>
        <button class = 'btn btn-danger'>categoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("categoria")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="color">color</label>
            <input id="color" name = "color" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="img">img</label>
            <input id="img" name = "img" type="text" class="form-control">
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