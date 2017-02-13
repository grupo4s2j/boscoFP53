@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show entidadorganizativa
    </h1>
    <br>
    <form method = 'get' action = '{!!url("entidadorganizativa")!!}'>
        <button class = 'btn btn-primary'>entidadorganizativa Index</button>
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
                    <b><i>nombre : </i></b>
                </td>
                <td>{!!$entidadorganizativa->nombre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>direccion : </i></b>
                </td>
                <td>{!!$entidadorganizativa->direccion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>geolocalizacion : </i></b>
                </td>
                <td>{!!$entidadorganizativa->geolocalizacion!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$entidadorganizativa->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection