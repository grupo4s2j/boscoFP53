@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ url('js/ImgMuestra.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/iziToast.min.css') }}">
<script type="text/javascript" src="{{ url('js/ComprobarImagen.js') }}"></script>
<script type="text/javascript" src="{{ url('js/iziToast.min.js') }}"></script>
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create evento
    </h1>
    <form method = 'get' action = '{!!url("evento")!!}'>
        <button class = 'btn btn-danger'>evento Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("evento")!!}' enctype="multipart/form-data">
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="titulo">titulo</label>
            <input id="titulo" name = "titulo" type="text" class="form-control" required >
        </div>
        <div class="form-group">
            <label for="descripcion">descripcion</label>
            <input id="descripcion" name = "descripcion" type="text" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="img">img</label><br>
                    <input id="botonimg" type="button" style="position: absolute; left: 490px; border: 1px solid black;" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                    <div style=" border: 3px solid black; background-color: white; width: 215px; height: 215px">
                        <img id="imgmuestra" class="" style="width: 200px; height: 200px; margin: 5 5 5 5" src=" "></img>
                    </div>        
                    <input required id="img" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
        </div>
        <div class="form-group">
            <label for="fechaInicio">fechaInicio</label>
            <input id="fechaInicio" name = "fechaInicio" type="text" class="form-control datepicker" required>
        </div>
        <div class="form-group">
            <label for="fechaFin">fechaFin</label>
            <input id="fechaFin" name = "fechaFin" type="text" class="form-control datepicker" required>
        </div>
        <button class = 'btn btn-primary' onclick="ComprobarImagen()" type ='submit'>Create</button>
    </form>
</section>
@endsection