@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Subcategoria Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("subcategoria")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New subcategoria</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Nombre</th>
            <th>Categoría</th>
            {{--<th>Orden</th>--}}
            {{--<th>Activo</th>--}}
            <th>Img</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($subcategorias as $subcategoria) 
            <tr>
                <td>{!!$subcategoria->nombre!!}</td>
                <td>{!!$subcategoria->categoria->nombre!!}</td>
                <td>{!!$subcategoria->categoria->img!!}</td>
                {{--<td>{!!$subcategoria->orden!!}</td>--}}
                {{--<td>{!!$subcategoria->activo!!}</td>--}}
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/subcategoria/{!!$subcategoria->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/subcategoria/{!!$subcategoria->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/subcategoria/{!!$subcategoria->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $subcategorias->render() !!}

</section>
@endsection