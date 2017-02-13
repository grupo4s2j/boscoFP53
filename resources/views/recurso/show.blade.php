@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show recurso
    </h1>
    <br>
    <form method = 'get' action = '{!!url("recurso")!!}'>
        <button class = 'btn btn-primary'>recurso Index</button>
    </form>
    <br>
    <table class = 'table table-bordered'>
        <thead>
            <th>Key</th>
            <th>Value</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <b><i>titulo : </i></b>
                </td>
                <td>{!!$recurso->titulo!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>descripcion : </i></b>
                </td>
                <td>{!!$recurso->descripcion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>contenido : </i></b>
                </td>
                <td>{!!$recurso->contenido!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>img : </i></b>
                </td>
                <td>{!!$recurso->img!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fechaPost : </i></b>
                </td>
                <td>{!!$recurso->fechaPost!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fechaInicio : </i></b>
                </td>
                <td>{!!$recurso->fechaInicio!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fechaFin : </i></b>
                </td>
                <td>{!!$recurso->fechaFin!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>rangoEdad : </i></b>
                </td>
                <td>{!!$recurso->rangoEdad!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>relevancia : </i></b>
                </td>
                <td>{!!$recurso->relevancia!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>idEntidadOrganizativa : </i></b>
                </td>
                <td>{!!$recurso->idEntidadOrganizativa!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$recurso->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection