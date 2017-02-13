@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create fichero
    </h1>
    <form method = 'get' action = '{!!url("fichero")!!}'>
        <button class = 'btn btn-danger'>fichero Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("fichero")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="url">url</label>
            <input id="url" name = "url" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="idRecurso">idRecurso</label>
            <input id="idRecurso" name = "idRecurso" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection