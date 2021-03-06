@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit comentario
    </h1>
    <form method = 'get' action = '{!!url("comentario")!!}'>
        <button class = 'btn btn-danger'>comentario Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("comentario")!!}/{!!$comentario->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="numero">numero</label>
            <input id="numero" name = "numero" type="text" class="form-control" value="{!!$comentario->
            numero!!}"> 
        </div>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$comentario->
            nombre!!}"> 
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input id="email" name = "email" type="text" class="form-control" value="{!!$comentario->
            email!!}"> 
        </div>
        <div class="form-group">
            <label for="mensaje">mensaje</label>
            <input id="mensaje" name = "mensaje" type="text" class="form-control" value="{!!$comentario->
            mensaje!!}"> 
        </div>
        <div class="form-group">
            <label for="aprobado">aprobado</label>
            <input id="aprobado" name = "aprobado" type="text" class="form-control" value="{!!$comentario->
            aprobado!!}"> 
        </div>
        <div class="form-group">
            <label for="numContestado">numContestado</label>
            <input id="numContestado" name = "numContestado" type="text" class="form-control" value="{!!$comentario->
            numContestado!!}"> 
        </div>
        <div class="form-group">
            <label for="idRecurso">idRecurso</label>
            <input id="idRecurso" name = "idRecurso" type="text" class="form-control" value="{!!$comentario->
            idRecurso!!}"> 
        </div>
        <button class = 'btn btn-primary' onclick="ComprobarImagen()" type ='submit'>Update</button>
    </form>
</section>
@endsection