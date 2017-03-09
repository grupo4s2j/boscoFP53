@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
@section('title','Create')
@section('content')

    <section class="content">
        <div class="box box-primary">
            <div class="box-header">
                <h3>Create recurso</h3>
            </div>

            <form method='get' action='{!!url("recurso")!!}'>
                <button class='btn btn-danger'>recurso Index</button>
            </form>
            <br>
            <div class="box-body">
                <form method='POST' action='{!!url("recurso")!!}' enctype="multipart/form-data">
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input id="titulo" name="titulo" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input id="descripcion" name="descripcion" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>
                        <textarea id="contenido" name="contenido" type="text" class="ckeditor" >
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">img</label><br>
                        <input id="botonimg" type="button" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                        <img id="imgmuestra" class="form-control" style="width: 200px; height: 200px; display:none" src=" "></img>
                        <input id="img" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
                    </div>
                    <div class="form-group">
                        <label for="fechaPost">fechaPost</label>
                        <input id="fechaPost" name="fechaPost" type="text" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">fechaInicio</label>
                        <input id="fechaInicio" name="fechaInicio" type="text" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">fechaFin</label>
                        <input id="fechaFin" name="fechaFin" type="text" class="form-control datepicker">
                    </div>
                    <div class="form-group">
                        <label for="rangoEdad">Rango de edad</label>
                        <input id="rangoEdad" name="rangoEdad" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="relevancia">Relevancia</label>
                        <input id="relevancia" name="relevancia" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="idEntidadOrganizativa">Entidad Organizativa</label>
                       <!-- <input id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control">-->
                        <SELECT id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control">

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
                        <select   id="tag_list"  name="tag_list[]" class="form-control"  multiple required></select>
                    </div>
                    <button class='btn btn-primary' type='submit'>Create</button>
                </form>
            </div>
        </div>


    </section>
@endsection