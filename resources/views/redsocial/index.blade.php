@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Redsocial Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("redsocial")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New redsocial</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>redSocial</th>
            <th>link</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($redsocials as $redsocial) 
            <tr>
                <td>{!!$redsocial->redSocial!!}</td>
                <td>{!!$redsocial->link!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/redsocial/{!!$redsocial->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/redsocial/{!!$redsocial->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/redsocial/{!!$redsocial->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $redsocials->render() !!}

</section>
@endsection