@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit banner
    </h1>
    <form method = 'get' action = '{!!url("banner")!!}'>
        <button class = 'btn btn-danger'>banner Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("banner")!!}/{!!$banner->
        id!!}/update' enctype="multipart/form-data"> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="img">img</label>
            <input id="img" name = "img" type="file" class="form-control" text="{!!$banner->
            img!!}"> 
        </div>
        <div class="form-group">
            <label for="url">url</label>
            <input id="url" name = "url" type="text" class="form-control" value="{!!$banner->
            url!!}"> 
        </div>
        <button class = 'btn btn-primary' type ='submit'>Update</button>
    </form>
</section>
@endsection