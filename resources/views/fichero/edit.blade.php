@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit fichero
    </h1>
    <form method = 'get' action = '{!!url("fichero")!!}'>
        <button class = 'btn btn-danger'>fichero Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("fichero")!!}/{!!$fichero->
        id!!}/update' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="url">url</label>
            <input id="url" name = "url" type="file" class="form-control" value="{!!$fichero->
            url!!}"> 
        </div>
        <div class="form-group">
            <label for="idRecurso">idRecurso</label>
            <input id="idRecurso" name = "idRecurso" type="text" class="form-control" value="{!!$fichero->
            idRecurso!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection