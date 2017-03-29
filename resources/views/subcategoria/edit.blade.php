@extends('scaffold-interface.layouts.app')
<script src = "https://code.jquery.com/jquery-2.1.1.min.js"></script>
<link rel="stylesheet" href="{{ url('css/iziToast.min.css') }}">
<script type="text/javascript" src="{{ url('js/iziToast.min.js') }}"></script>
<script type="text/javascript" src="{{ url('js/ImgMuestra.js') }}"></script>
<script type="text/javascript" src="{{ url('js/ComprobarImagenEdit.js') }}"></script>
@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3>Editar Subcategoria ({{$subcategoria->nombre}})</h3>
        </div>
        <div class="box-body">
            <form method = 'POST' action = '{!! url("subcategoria")!!}/{!!$subcategoria->
        id!!}/update' enctype="multipart/form-data"> 
                {!! csrf_field() !!}
                <input type="hidden" name = "user_id" value = "{{$subcategoria->id}}">
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name = "nombre" value = "{{$subcategoria->nombre}}" class = "form-control" required>
                </div>
                {{--<div class="form-group">
                    <label for="">Orden</label>
                    <input type="text" name = "orden" value = "{{$subcategoria->orden}}" class = "form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Activo</label>
                    <input type="text" name = "activo" value = "{{$subcategoria->activo}}" class = "form-control" required>
                </div>--}}
                <div class="form-group">
                    <label for="">Categoría</label>
                    <select name="idCategoria" id="" class = "form-control">
                        @foreach($categorias as $categoria)
                        @if ($categoria->id==$subcategoria->idCategoria)
                                <option value="{{$categoria->id}}" selected="selected">{{$categoria->nombre}}</option>
                            @else
                                <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>
                        @endif
                        
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="img">img</label><br>
                    <input id="botonimg" type="button" style="position: absolute; left: 250px;" class="btn btn-primary" onclick="document.getElementById('img').click()" value="Insertar Imagen"></input>
                    <div style=" border: 3px solid black; background-color: white; width: 215px; height: 215px">
                            <img id="imgmuestra" class="" style="width: 200px; height: 200px; margin: 5 5 5 5" src="{{asset('img/subcategorias/')}}/{!!$subcategoria->img!!}"></img>
                    </div>
                    <input  id="img" name="img" type="file" accept="image/*" onchange="CambiarFotoRecurso(this);" class="form-control" style="display: none"></input>
                </div>
                <button class = "btn btn-primary" onclick="ComprobarImagen()" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</section>
@endsection
    