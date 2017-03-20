@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create redsocial
    </h1>
    <form method = 'get' action = '{!!url("redsocial")!!}'>
        <button class = 'btn btn-danger'>redsocial Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("redsocial")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="redSocial">redSocial</label>
            <input id="redSocial" name = "redSocial" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="link">link</label>
            <input id="link" name = "link" type="text" class="form-control" required>
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection