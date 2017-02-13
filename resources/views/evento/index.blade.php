@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Evento Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("evento")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New evento</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>titulo</th>
            <th>descripcion</th>
            <th>img</th>
            <th>fechaInicio</th>
            <th>fechaFin</th>
            <th>activo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($eventos as $evento) 
            <tr>
                <td>{!!$evento->titulo!!}</td>
                <td>{!!$evento->descripcion!!}</td>
                <td>{!!$evento->img!!}</td>
                <td>{!!$evento->fechaInicio!!}</td>
                <td>{!!$evento->fechaFin!!}</td>
                <td>{!!$evento->activo!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/evento/{!!$evento->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/evento/{!!$evento->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/evento/{!!$evento->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $eventos->render() !!}

</section>
@endsection