@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create comentario
    </h1>
    <form method = 'get' action = '{!!url("comentario")!!}'>
        <button class = 'btn btn-danger'>comentario Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("comentario")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="numero">numero</label>
            <input id="numero" name = "numero" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input id="email" name = "email" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="mensaje">mensaje</label>
            <input id="mensaje" name = "mensaje" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="aprobado">aprobado</label>
            <input id="aprobado" name = "aprobado" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="numContestado">numContestado</label>
            <input id="numContestado" name = "numContestado" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="idRecurso">idRecurso</label>
            <input id="idRecurso" name = "idRecurso" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection