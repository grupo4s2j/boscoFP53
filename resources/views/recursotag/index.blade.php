@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Recursotag Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("recursotag")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New recursotag</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>idRecursos</th>
            <th>idTag</th>
            <th>activo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($recursotags as $recursotag) 
            <tr>
                <td>{!!$recursotag->idRecursos!!}</td>
                <td>{!!$recursotag->idTag!!}</td>
                <td>{!!$recursotag->activo!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/recursotag/{!!$recursotag->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/recursotag/{!!$recursotag->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/recursotag/{!!$recursotag->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $recursotags->render() !!}

</section>
@endsection