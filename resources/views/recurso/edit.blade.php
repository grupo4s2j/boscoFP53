
@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="/js/ImgMuestra.js"></script>
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
        id!!}/update' enctype="multipart/form-data">
                    <input type='hidden' name='_token' value='{{Session::token()}}'>
                    <div class="form-group">
                        <label for="titulo">Titulo</label>
                        <input id="titulo" name="titulo" type="text" class="form-control" value="{!!$recurso->
            titulo!!}">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <input id="descripcion" name="descripcion" type="text" class="form-control" value="{!!$recurso->
            descripcion!!}">
                    </div>
                    <div class="form-group">
                        <label for="contenido">Contenido</label>

            <textarea id="contenido" name="contenido" type="text" class="ckeditor">
                {!!$recurso->contenido!!}
            </textarea>
            </div>
            <div class="form-group">
                
                    <label for="img">img</label><br>
                    <input id="botonimg" type="button" class=" btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                    <img id="imgmuestra" class="form-control" style="width: 200px; height: 200px" src="/img/recursos/{{$recurso->img}}"></img>
                    
                   
                <input id="img" name="img" type="file" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
            </div>
            <div class="form-group">
                <label for="fechaPost">fechaPost</label>
                <input id="fechaPost" name="fechaPost" type="text" class="form-control datepicker" value="{!!$recurso->
            fechaPost!!}">
                    </div>
                    <div class="form-group">
                        <label for="fechaInicio">fechaInicio</label>
                        <input id="fechaInicio" name="fechaInicio" type="text" class="form-control datepicker" value="{!!$recurso->
            fechaInicio!!}">
                    </div>
                    <div class="form-group">
                        <label for="fechaFin">fechaFin</label>
                        <input id="fechaFin" name="fechaFin" type="text" class="form-control datepicker" value="{!!$recurso->
            fechaFin!!}">
                    </div>
                    <div class="form-group">
                        <label for="rangoEdad">Rango de edad</label>
                        <input id="rangoEdad" name="rangoEdad" type="text" class="form-control" value="{!!$recurso->
            rangoEdad!!}">
                    </div>
                    <div class="form-group">
                        <label for="relevancia">Relevancia</label>
                        <input id="relevancia" name="relevancia" type="text" class="form-control" value="{!!$recurso->
            relevancia!!}">
                    </div>
                    <div class="form-group">
                        <label for="idEntidadOrganizativa">Entidad organizativa</label>
                        <!-- <input id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control" value="{!!$recurso->
            idEntidadOrganizativa!!}">-->
                        <SELECT id="idEntidadOrganizativa" name="idEntidadOrganizativa" type="text" class="form-control"
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
                        <select id="tag_list" name="tag_list[]" class="form-control" multiple></select>
                    </div>
                    <script> var data ={!!$tags!!}</script>
                    <button class='btn btn-primary' type='submit'>Update</button>
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
                                <select name="subcategoria_id" id="" class="form-control">
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
@endsection