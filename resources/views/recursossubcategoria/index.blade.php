@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Recursossubcategoria Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("recursossubcategoria")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New recursossubcategoria</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>idRecursos</th>
            <th>idSubcategorias</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($recursossubcategorias as $recursossubcategoria) 
            <tr>
                <td>{!!$recursossubcategoria->idRecursos!!}</td>
                <td>{!!$recursossubcategoria->idSubcategorias!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/recursossubcategoria/{!!$recursossubcategoria->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/recursossubcategoria/{!!$recursossubcategoria->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/recursossubcategoria/{!!$recursossubcategoria->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $recursossubcategorias->render() !!}

</section>
@endsection