@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
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
                    <input id="botonimg" type="button" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                    <img id="imgmuestra" class="form-control" style="width: 200px; height: 200px; display:none" src=" ">
                    <input id="img" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none" required></input>
        </div>
        <div class="form-group">
            <label for="fechaInicio">fechaInicio</label>
            <input id="fechaInicio" name = "fechaInicio" type="text" class="form-control datepicker" required>
        </div>
        <div class="form-group">
            <label for="fechaFin">fechaFin</label>
            <input id="fechaFin" name = "fechaFin" type="text" class="form-control datepicker" required>
        </div>
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection