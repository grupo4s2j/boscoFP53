@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show subcategoria
    </h1>
    <br>
    <form method = 'get' action = '{!!url("subcategoria")!!}'>
        <button class = 'btn btn-primary'>subcategoria Index</button>
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
                    <b><i>idCategoria : </i></b>
                </td>
                <td>{!!$subcategoriaa->idCategoria!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nombre : </i></b>
                </td>
                <td>{!!$subcategoria->nombre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>orden : </i></b>
                </td>
                <td>{!!$subcategoria->orden!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$subcategoria->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection