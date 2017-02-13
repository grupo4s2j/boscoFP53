@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Redsocialusuario Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("redsocialusuario")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New redsocialusuario</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>idRedsocial</th>
            <th>user</th>
            <th>pass</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($redsocialusuarios as $redsocialusuario) 
            <tr>
                <td>{!!$redsocialusuario->idRedsocial!!}</td>
                <td>{!!$redsocialusuario->user!!}</td>
                <td>{!!$redsocialusuario->pass!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/redsocialusuario/{!!$redsocialusuario->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/redsocialusuario/{!!$redsocialusuario->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/redsocialusuario/{!!$redsocialusuario->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $redsocialusuarios->render() !!}

</section>
@endsection