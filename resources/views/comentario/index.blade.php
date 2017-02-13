@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Comentario Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("comentario")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New comentario</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>numero</th>
            <th>nombre</th>
            <th>email</th>
            <th>mensaje</th>
            <th>aprobado</th>
            <th>numContestado</th>
            <th>activo</th>
            <th>idRecurso</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($comentarios as $comentario) 
            <tr>
                <td>{!!$comentario->numero!!}</td>
                <td>{!!$comentario->nombre!!}</td>
                <td>{!!$comentario->email!!}</td>
                <td>{!!$comentario->mensaje!!}</td>
                <td>{!!$comentario->aprobado!!}</td>
                <td>{!!$comentario->numContestado!!}</td>
                <td>{!!$comentario->activo!!}</td>
                <td>{!!$comentario->idRecurso!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/comentario/{!!$comentario->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/comentario/{!!$comentario->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/comentario/{!!$comentario->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $comentarios->render() !!}

</section>
@endsection