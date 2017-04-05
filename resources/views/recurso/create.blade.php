@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="{{ url('js/ImgMuestra.js') }}"></script>
<link rel="stylesheet" href="{{ url('css/iziToast.min.css') }}">
<script type="text/javascript" src="{{ url('js/ComprobarImagen.js') }}"></script>
<script type="text/javascript" src="{{ url('js/iziToast.min.js') }}"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@section('title','Create')
@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3>Crear nou recurs</h3>
            </div>
            <form method='get' action='{!!url("recurso")!!}'>
                <button class='btn btn-danger'>Tornar al llistat</button>
            </form>
            <br>
            <div class="box-body">
                <form method='POST' action='{!!url("recurso")!!}' enctype="multipart/form-data">
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                    <div class="form-group">
                        <label for="titulo">Títol</label>
                        <input id="titulo" name="titulo" pattern=".{1,100}" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripció</label>
                        <input id="descripcion" name="descripcion" type="text" class="form-control"  required>
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contingut</label>
                        <textarea id="contenido" name="contenido" type="text" class="ckeditor"  required>
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Imatge</label><br>
                        <input id="botonimg" style="position: absolute; left: 250px; " type="button"  class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar imatge"></input>
                        <div style=" border: 3px solid black; background-color: white; width: 215px; height: 215px">
                            <img id="imgmuestra" style="width: 200px; height: 200px; margin: 5 5 5 5;" src=" "></img>
                        </div>
                        <input required id="img" accept="image/*" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
                    </div>
                    <div class="form-group">
                        <label for="fechaPost">Data publicació</label>
                        <input id="fechaPost" name="fechaPost" type="datetime-local" class="form-control" required>
                    </div>
                    <script>
                    <?php 
                    date_default_timezone_set('Europe/Madrid');
                    $date = date('Y-m-d', time());
                    $time = date('H:i', time());
                    $datetime = $date . "T" . $time;
                    ?>
                    document.getElementById("fechaPost").value ="<?php echo $datetime?>";
                    </script>
                    <div class="form-group">
                    <input type="checkbox" id="eventocb" data-toggle="toggle">
                    </div>
                    <div id = "divEventos">
                    <div class="form-group">
                        <label for="fechaInicio">Data inici</label>
                        <input id="fechaInicio" name="fechaInicio" type="datetime-local" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">Data fi</label>
                        <input id="fechaFin" name="fechaFin" type="datetime-local" class="form-control" required>
                    </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="rangoEdad">Rango de edad</label>
                        <input id="rangoEdad" name="rangoEdad" type="text" class="form-control" required>
                    </div>-->
                    <div class="form-group">
                        <label for="relevancia">Rellevància</label>
                        <input id="relevancia" name="relevancia" type="number" class="form-control" min="1" max="5" required>
                    </div>
                    <div class="form-group">
                        <label for="idEntidadOrganizativa">Entitat organitzativa</label>
                       <!-- <input id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control">-->
                        <SELECT id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control" required>
                            @foreach($entidades as $entidad)
                                <option value="{{$entidad->id}}">{{$entidad->nombre}}</option>
                            @endforeach
                        </SELECT>
                    </div>
                   {{-- <div class="form-group">
                        <label for="activo">activo</label>
                        <input id="activo" name="activo" type="text" class="form-control">
                    </div>--}}

                    <div class="form-group">
                        <label for="tag_list">Tags:</label>
                        <!--data-data='[{"id": "1", "text": "One"}, {"id": "2", "text": "Two"}] data-tags="true"'-->
                        <select   id="tag_list"  name="tag_list[]" class="form-control"  multiple required ></select>
                    </div>
                    <label for="Genero">Gènere:</label>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="alumno" value="0" />
                        </label>
                            <input id="alumno" name="alumno" type="checkbox" checked value = "1">Alumnes
                        <label class="checkbox-inline">
                            <input type="hidden" name="profesor" value="0" />
                            <input id="profesor" name="profesor" type="checkbox" checked value = "1">Profesors
                        </label>
                    </div>
                    <button class='btn btn-primary' onclick="ComprobarImagen()" type='submit'>Desar canvis</button>
                </form>
            </div>
        </div>
    </section>
    <script>
        $('#eventocb').bootstrapToggle({
            on: 'Evento',
            off: 'Recurso'
        });
        $('#divEventos').hide();
        $("#fechaInicio").prop('disabled', true);
        $("#fechaFin").prop('disabled', true);
        $( "#eventocb" ).change(function() {
        if($("#eventocb").is(':checked')){
            $('#divEventos').show();
            $("#fechaInicio").prop('disabled', false);
            $("#fechaFin").prop('disabled', false);
        }
        else{
            $('#divEventos').hide();
            $("#fechaInicio").prop('disabled', true);
            $("#fechaFin").prop('disabled', true);
        }
        });
    </script>
@endsection