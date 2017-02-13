@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Categoria Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("categoria")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New categoria</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>nombre</th>
            <th>color</th>
            <th>img</th>
            <th>orden</th>
            <th>activo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($categorias as $categoria)
            <tr>
                <td>{!!$categoria->nombre!!}</td>
                <td>{!!$categoria->color!!}</td>
                <td>{!!$categoria->img!!}</td>
                <td>{!!$categoria->orden!!}</td>
                <td>{!!$categoria->activo!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/categoria/{!!$categoria->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = "{{url('/categoria/')}}/{{$categoria->id}}/{{'edit'}}" class = 'viewEdit btn btn-primary btn-xs' data-link = '/categoria/{!!$categoria->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/categoria/{!!$categoria->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $categorias->render() !!}

</section>
@endsection