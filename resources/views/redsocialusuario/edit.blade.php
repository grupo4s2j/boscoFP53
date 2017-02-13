@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit redsocialusuario
    </h1>
    <form method = 'get' action = '{!!url("redsocialusuario")!!}'>
        <button class = 'btn btn-danger'>redsocialusuario Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("redsocialusuario")!!}/{!!$redsocialusuario->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="idRedsocial">idRedsocial</label>
            <input id="idRedsocial" name = "idRedsocial" type="text" class="form-control" value="{!!$redsocialusuario->
            idRedsocial!!}"> 
        </div>
        <div class="form-group">
            <label for="user">user</label>
            <input id="user" name = "user" type="text" class="form-control" value="{!!$redsocialusuario->
            user!!}"> 
        </div>
        <div class="form-group">
            <label for="pass">pass</label>
            <input id="pass" name = "pass" type="text" class="form-control" value="{!!$redsocialusuario->
            pass!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection