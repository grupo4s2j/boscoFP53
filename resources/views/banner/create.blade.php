@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ url('js/ImgMuestra.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/iziToast.min.css') }}">
<script type="text/javascript" src="{{ url('js/iziToast.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/ComprobarImagen.js') }}"></script>

@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create banner
    </h1>
    <form method = 'get' action = '{!!url("banner")!!}'>
        <button class = 'btn btn-danger'>banner Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("banner")!!}' enctype="multipart/form-data">
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="img">img</label><br>
                <input id="botonimg" type="button" style="position: absolute; left: 250px;" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                <div style=" border: 3px solid black; background-color: white; width: 215px; height: 215px">
                            <img id="imgmuestra" style="width: 200px; height: 200px; margin: 5 5 5 5;" src=" "></img>
                </div>
                <input required id="img" name="img" accept="image/*" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
        </div>
        <div class="form-group">
            <label for="url">url</label>
            <input id="url" name = "url" type="text" class="form-control">
        </div>
        <button class = 'btn btn-primary' onclick="ComprobarImagen()" type ='submit'>Create</button>
    </form>
</section>
@endsection