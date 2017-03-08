@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
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
            <label for="img">img</label><br>
                <input id="botonimg" type="button" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                <img id="imgmuestra" class="form-control" style="width: 200px; height: 200px" src="{{ $banner->img }}"></img>
                <input id="img" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
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