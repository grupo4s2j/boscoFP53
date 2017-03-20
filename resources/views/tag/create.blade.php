@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create tag
    </h1>
    <form method = 'get' action = '{!!url("tag")!!}'>
        <button class = 'btn btn-danger'>tag Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("tag")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="usado">usado</label>
            <input id="usado" name = "usado" type="text" class="form-control" required>
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection