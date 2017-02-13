@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Entidadorganizativa Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("entidadorganizativa")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New entidadorganizativa</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>nombre</th>
            <th>direccion</th>
            <th>geolocalizacion</th>
            <th>activo</th>
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($entidadorganizativas as $entidadorganizativa) 
            <tr>
                <td>{!!$entidadorganizativa->nombre!!}</td>
                <td>{!!$entidadorganizativa->direccion!!}</td>
                <td>{!!$entidadorganizativa->geolocalizacion!!}</td>
                <td>{!!$entidadorganizativa->activo!!}</td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/entidadorganizativa/{!!$entidadorganizativa->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/entidadorganizativa/{!!$entidadorganizativa->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/entidadorganizativa/{!!$entidadorganizativa->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $entidadorganizativas->render() !!}

</section>
@endsection