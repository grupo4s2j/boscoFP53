@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit redsocial
    </h1>
    <form method = 'get' action = '{!!url("redsocial")!!}'>
        <button class = 'btn btn-danger'>redsocial Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("redsocial")!!}/{!!$redsocial->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="redSocial">redSocial</label>
            <input id="redSocial" name = "redSocial" type="text" class="form-control" value="{!!$redsocial->
            redSocial!!}"> 
        </div>
        <div class="form-group">
            <label for="link">link</label>
            <input id="link" name = "link" type="text" class="form-control" value="{!!$redsocial->
            link!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection