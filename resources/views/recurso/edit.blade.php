@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

    <section class="content">
        <h1>
            Edit recurso
        </h1>
        <form method='get' action='{!!url("recurso")!!}'>
            <button class='btn btn-danger'>recurso Index</button>
        </form>
        <br>
        <form method='POST' action='{!! url("recurso")!!}/{!!$recurso->
        id!!}/update'>
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">
                <label for="titulo">titulo</label>
                <input id="titulo" name="titulo" type="text" class="form-control" value="{!!$recurso->
            titulo!!}">
            </div>
            <div class="form-group">
                <label for="descripcion">descripcion</label>
                <input id="descripcion" name="descripcion" type="text" class="form-control" value="{!!$recurso->
            descripcion!!}">
            </div>
            <div class="form-group">
                <label for="contenido">contenido</label>

            <textarea id="contenido" name="contenido" type="text" class="ckeditor">
                {!!$recurso->contenido!!}
            </textarea>
            </div>
            <div class="form-group">
                <label for="img">img</label>
                <input id="img" name="img" type="text" class="form-control" value="{!!$recurso->
            img!!}">
            </div>
            <div class="form-group">
                <label for="fechaPost">fechaPost</label>
                <input id="fechaPost" name="fechaPost" type="text" class="form-control" value="{!!$recurso->
            fechaPost!!}">
            </div>
            <div class="form-group">
                <label for="fechaInicio">fechaInicio</label>
                <input id="fechaInicio" name="fechaInicio" type="text" class="form-control" value="{!!$recurso->
            fechaInicio!!}">
            </div>
            <div class="form-group">
                <label for="fechaFin">fechaFin</label>
                <input id="fechaFin" name="fechaFin" type="text" class="form-control" value="{!!$recurso->
            fechaFin!!}">
            </div>
            <div class="form-group">
                <label for="rangoEdad">rangoEdad</label>
                <input id="rangoEdad" name="rangoEdad" type="text" class="form-control" value="{!!$recurso->
            rangoEdad!!}">
            </div>
            <div class="form-group">
                <label for="relevancia">relevancia</label>
                <input id="relevancia" name="relevancia" type="text" class="form-control" value="{!!$recurso->
            relevancia!!}">
            </div>
            <div class="form-group">
                <label for="idEntidadOrganizativa">idEntidadOrganizativa</label>
                <input id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control" value="{!!$recurso->
            idEntidadOrganizativa!!}">
            </div>
            <div class="form-group">
                <label for="activo">activo</label>
                <input id="activo" name="activo" type="text" class="form-control" value="{!!$recurso->
            activo!!}">
            </div>
            <button class='btn btn-primary' type='submit'>Update</button>
        </form>
    </section>
@endsection