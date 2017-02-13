@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Tag Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("tag")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New tag</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>nombre</th>
            <th>usado</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($tags as $tag) 
            <tr>
                <td>{!!$tag->nombre!!}</td>
                <td>{!!$tag->usado!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/tag/{!!$tag->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/tag/{!!$tag->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/tag/{!!$tag->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $tags->render() !!}

</section>
@endsection