@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Fichero Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("fichero")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New fichero</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>url</th>
            <th>idRecurso</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($ficheros as $fichero) 
            <tr>
                <td>{!!$fichero->url!!}</td>
                <td>{!!$fichero->idRecurso!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/fichero/{!!$fichero->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/fichero/{!!$fichero->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/fichero/{!!$fichero->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $ficheros->render() !!}

</section>
@endsection