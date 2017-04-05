@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Editar tag
    </h1>
    <form method = 'get' action = '{!!url("tag")!!}'>
        <button class = 'btn btn-danger'>Tornar al llistat</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("tag")!!}/{!!$tag->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nom</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$tag->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="usado">Usat</label>
            <input id="usado" name = "usado" type="text" class="form-control" value="{!!$tag->
            usado!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection