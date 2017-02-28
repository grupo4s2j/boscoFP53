@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

<section class="content">
    <h1>
        Create subcategoria
    </h1>
    <form method = 'get' action = '{!!url("subcategoria")!!}'>
        <button class = 'btn btn-danger'>subcategoria Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!!url("subcategoria")!!}'>
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="">Categoría</label>
            <select name="idCategoria" id="idCategoria" class = "form-control">
                @foreach($categorias as $categoria)

                        <option value="{{$categoria->id}}">{{$categoria->nombre}}</option>


                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="img">img</label>
            <input id="img" name = "img" type="file" class="form-control">
        </div>
        {{--<div class="form-group">
            <label for="orden">orden</label>
            <input id="orden" name = "orden" type="text" class="form-control">
        </div>
        <div class="form-group">
            <label for="activo">activo</label>
            <input id="activo" name = "activo" type="text" class="form-control">
        </div>--}}
        <button class = 'btn btn-primary' type ='submit'>Create</button>
    </form>
</section>
@endsection