@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create recursotag
    </h1>
    <form method = 'get' action = '{!!url("recursotag")!!}'>
        <button class = 'btn btn-danger'>recursotag Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("recursotag")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idRecursos">idRecursos</label>
            <input id="idRecursos" name = "idRecursos" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="idTag">idTag</label>
            <input id="idTag" name = "idTag" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection