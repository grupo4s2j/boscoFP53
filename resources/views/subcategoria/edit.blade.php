@extends('scaffold-interface.layouts.app')
@section('content')
<section class="content">
    <div class="box box-primary">
        <div class="box-header">
            <h3>Editar Subcategoria ({{$subcategoria->nombre}})</h3>
        </div>
        <div class="box-body">
            <form method = 'POST' action = '{!! url("subcategoria")!!}/{!!$subcategoria->
        id!!}/update'> 
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
                    <label for="img">img</label>
                    <input id="img" name = "img" type="file" class="form-control">
                </div>
                <button class = "btn btn-primary" type="submit">Guardar</button>
            </form>
        </div>
    </div>
</section>
@endsection
    