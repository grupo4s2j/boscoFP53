@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit recursotag
    </h1>
    <form method = 'get' action = '{!!url("recursotag")!!}'>
        <button class = 'btn btn-danger'>recursotag Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("recursotag")!!}/{!!$recursotag->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idRecursos">idRecursos</label>
            <input id="idRecursos" name = "idRecursos" type="text" class="form-control" value="{!!$recursotag->
            idRecursos!!}"> 
        </div>
        <div class="form-group">
            <label for="idTag">idTag</label>
            <input id="idTag" name = "idTag" type="text" class="form-control" value="{!!$recursotag->
            idTag!!}"> 
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control" value="{!!$recursotag->
            activo!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection