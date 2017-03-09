@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show evento
    </h1>
    <br>
    <form method = 'get' action = '{!!url("evento")!!}'>
        <button class = 'btn btn-primary'>evento Index</button>
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
                <td>{!!$evento->titulo!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>descripcion : </i></b>
                </td>
                <td>{!!$evento->descripcion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>img : </i></b>
                </td>
                <td>/img/eventos/{!!$evento->img!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fechaInicio : </i></b>
                </td>
                <td>{!!$evento->fechaInicio!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>fechaFin : </i></b>
                </td>
                <td>{!!$evento->fechaFin!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$evento->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection