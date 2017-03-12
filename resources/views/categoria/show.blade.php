@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show categoria
    </h1>
    <br>
    <form method = 'get' action = '{!!url("categoria")!!}'>
        <button class = 'btn btn-primary'>categoria Index</button>
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
                <td>/img/categorias/{!!$categoria->nombre!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection