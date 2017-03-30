@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<link rel="stylesheet" href="{{ url('css/iziToast.min.css') }}">
<script type="text/javascript" src="{{ url('js/iziToast.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/ImgMuestra.js') }}"></script>
<script type="text/javascript" src="{{ url('js/ComprobarImagenEdit.js') }}"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
@section('title','Edit')
@section('content')

    <section class="content">
        <h1 id="titl">
            Edit recurso
        </h1>
        <form method='get' action='{!!url("recurso")!!}'>
            <button class='btn btn-danger'>recurso Index</button>
        </form>
        <br>
        <div class="box box-primary">
            <div class="box-header">
                <h3>Subcategorias </h3>
            </div>
            <div class="box-body">
                <form method='POST' action='{!! url("recurso")!!}/{!!$recurso->
        id!!}/update' enctype="multipart/form-data" >
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" value="{!!$recurso->
            titulo!!}" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{!!$recurso->
            descripcion!!}" required >
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>

            <textarea id="contenido" name="contenido" type="text" class="ckeditor" required>
                {!!$recurso->contenido!!}
            </textarea>
            </div>
            <div class="form-group">
                
                    <label for="img">img</label><br>
                    <input id="botonimg" type="button" style="position: absolute; left: 230px; border: 1px solid black;" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                    <div style=" border: 3px solid black; background-color: white; width: 215px; height: 215px">
                         @if(!is_null($recurso->img))  
                            <img id="imgmuestra"  style="width: 200px; height: 200px; margin: 5 5 5 5" src="{{asset('img/recursos/')}}/{!!$recurso->img!!}"></img>
                         @else
                            <img id="imgmuestra"  style="width: 200px; height: 200px; margin: 5 5 5 5" src="{{asset('img/recursos/')}}/{!!$Recurso->img!!}"></img>
                         @endif
                    </div>
                   
                <input  id="img" name="img" accept="image/*" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none" ></input>
            </div>
            <div class="form-group">
                <label for="fechaPost">fechaPost</label>
                <input id="fechaPost" name="fechaPost" type="datetime-local" class="form-control" required>
                    </div>
                <script>
                    <?php
                    $date = substr($recurso->fechaPost, 0, 10); 
                    $time = substr($recurso->fechaPost, 11, 5); 
                    $datetime = $date . "T" . $time;
                    ?>
                document.getElementById("fechaPost").value ="<?php echo $datetime?>";
                </script>
                    <div class="form-group">
                        <input type="checkbox" id="eventocb" data-toggle="toggle">
                    </div>
                    <div id="divEventos">
                    <div class="form-group">
                        <label for="fechaInicio">fechaInicio</label>
                        <input id="fechaInicio" name="fechaInicio" type="datetime-local" class="form-control" value="{!!$recurso->
            fechaInicio!!}" required>
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">fechaFin</label>
                        <input id="fechaFin" name="fechaFin" type="datetime-local" class="form-control" value="{!!$recurso->
            fechaFin!!}" required>
                    </div>
                    </div>
                    <!--<div class="form-group">
                        <label for="rangoEdad">Rango de edad</label>
                        <input id="rangoEdad" name="rangoEdad" type="text" class="form-control" value="{!!$recurso->
            rangoEdad!!}" required>
                    </div>-->
                    <div class="form-group">
                        <label for="relevancia">Relevancia</label>
                        <input id="relevancia" name="relevancia" type="number" class="form-control" min="1" max="5" value="{!!$recurso->
            relevancia!!}" required>
                    </div>
                    <div class="form-group">
                        <label for="idEntidadOrganizativa">Entidad organizativa</label>
                        <!-- <input id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control" value="{!!$recurso->
            idEntidadOrganizativa!!}">-->
                        <SELECT required id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control"
                                value="{!!$recurso->
            idEntidadOrganizativa!!}">>
                            @foreach($entidades as $entidad)
                                @if ($entidad->id==$recurso->idEntidadOrganizativa)
                                    <option value="{{$entidad->id}}" selected="selected">{{$entidad->nombre}}</option>
                                @else
                                    <option value="{{$entidad->id}}">{{$entidad->nombre}}</option>
                                @endif
                            @endforeach
                        </SELECT>
                    </div>
                    {{-- <div class="form-group">
                         <label for="activo">activo</label>
                         <input id="activo" name="activo" type="text" class="form-control" value="{!!$recurso->
                     activo!!}">
                     </div>--}}
                    <div class="form-group">
                        <label for="tag_list">Tags:</label>
                        <select id="tag_list" name="tag_list[]" class="form-control" multiple required></select>
                    </div>
                    <script> var data ={!!$tags!!}</script>
                    <label for="Genero">Género:</label>
                    <div class="form-group">
                        <label class="checkbox-inline">
                            <input type="hidden" name="alumno" value="0" />
                            <?php if($alumno == 1){ ?>
                                <input id="alumno" name="alumno" type="checkbox" checked value = "1">Alumnos
                            <?php }
                            else{ ?>
                                <input id="alumno" name="alumno" type="checkbox" value = "1">Alumnos
                            <?php } ?>
                        </label>
                        <label class="checkbox-inline">
                            <input type="hidden" name="profesor" value="0" />
                            <?php if($profesor == 1){ ?>
                                <input id="profesor" name="profesor" type="checkbox" checked value = "1">Profesores
                            <?php }
                            else{ ?>
                                <input id="profesor" name="profesor" type="checkbox"  value = "1">Profesores
                            <?php } ?>
                            
                        </label>
                    </div>
                    <button class='btn btn-primary' onclick="ComprobarImagen()" type='submit'>Update</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3>Subcategorias </h3>
                    </div>
                    <div class="box-body">
                        <form action="{{url('recurso/addSubcategoria')}}" method="post">
                            {!! csrf_field() !!}
                            <input type="hidden" name="idRecursos" value="{{$recurso->id}}">
                            <div class="form-group">
                                <select name="subcategoria_id" id="" class="form-control" required>
                                    @foreach($subcategorias as $role)
                                        <option value="{{$role->id}}">{{$role->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button class='btn btn-primary'>Add Subcategoria</button>
                            </div>
                        </form>
                        <table class='table'>
                            <thead>
                            <th>Subcategoria</th>
                            <th>Action</th>
                            </thead>
                            <tbody>
                            @foreach($recursoSubcategorias as $role)
                                <tr>
                                    <td>{{$role->nombre}}</td>
                                    <td>
                                        <a href="{{url('recurso/removeSubcategoria')}}/{{str_slug($role->id,'-')}}/{{$recurso->id}}"
                                           class="btn btn-danger btn-sm"><i class="fa fa-trash-o"
                                                                            aria-hidden="true"></i></a></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
    </section>
        <script>
        $('#eventocb').bootstrapToggle({
            on: 'Evento',
            off: 'Recurso'
        });
        if ("<?php "{{!!$recurso->fechaInicio!!}}" ?>" == ""){
            $('#divEventos').hide();
            $("#fechaInicio").prop('disabled', true);
            $("#fechaFin").prop('disabled', true);
        }
        else{
            $('#eventocb').prop('checked', true);
        }
        
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