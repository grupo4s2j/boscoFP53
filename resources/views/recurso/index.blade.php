@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')

<section class="content">
    <h1>
        Recurso Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("recurso")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New recurso</button>
    </form>
    <br>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>titulo</th>
            <th>descripcion</th>
           <!-- <th>contenido</th>-->
            <th>img</th>
            <th>fechaPost</th>
            <th>fechaInicio</th>
            <th>fechaFin</th>
            <th>rangoEdad</th>
            <th>relevancia</th>
            <th>idEntidadOrganizativa</th>
            {{--<th>activo</th>--}}
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($recursos as $recurso) 
            <tr>
                <td>{!!$recurso->titulo!!}</td>
                <td>{!!$recurso->descripcion!!}</td>
                <!--<td>{/*!!$recurso->contenido!!*/}</td>-->
                <td><img src="{!!$recurso->img!!}" style="width: 100px; height: 100px;"></img></td>
                <td>{!!$recurso->fechaPost!!}</td>
                <td>{!!$recurso->fechaInicio!!}</td>
                <td>{!!$recurso->fechaFin!!}</td>
                <td>{!!$recurso->rangoEdad!!}</td>
                <td>{!!$recurso->relevancia!!}</td>
                <td>{!!$recurso->idEntidadOrganizativa!!}</td>
                {{--<td>{!!$recurso->activo!!}</td>--}}
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/recurso/{!!$recurso->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/recurso/{!!$recurso->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/recurso/{!!$recurso->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $recursos->render() !!}

</section>
@endsection