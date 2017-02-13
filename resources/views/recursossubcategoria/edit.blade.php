@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit recursossubcategoria
    </h1>
    <form method = 'get' action = '{!!url("recursossubcategoria")!!}'>
        <button class = 'btn btn-danger'>recursossubcategoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("recursossubcategoria")!!}/{!!$recursossubcategoria->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idRecursos">idRecursos</label>
            <input id="idRecursos" name = "idRecursos" type="text" class="form-control" value="{!!$recursossubcategoria->
            idRecursos!!}"> 
        </div>
        <div class="form-group">
            <label for="idSubcategorias">idSubcategorias</label>
            <input id="idSubcategorias" name = "idSubcategorias" type="text" class="form-control" value="{!!$recursossubcategoria->
            idSubcategorias!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection