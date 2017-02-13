@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show recursossubcategoria
    </h1>
    <br>
    <form method = 'get' action = '{!!url("recursossubcategoria")!!}'>
        <button class = 'btn btn-primary'>recursossubcategoria Index</button>
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
                    <b><i>idRecursos : </i></b>
                </td>
                <td>{!!$recursossubcategoria->idRecursos!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>idSubcategorias : </i></b>
                </td>
                <td>{!!$recursossubcategoria->idSubcategorias!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection