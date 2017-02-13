@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show redsocialusuario
    </h1>
    <br>
    <form method = 'get' action = '{!!url("redsocialusuario")!!}'>
        <button class = 'btn btn-primary'>redsocialusuario Index</button>
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
                    <b><i>idRedsocial : </i></b>
                </td>
                <td>{!!$redsocialusuario->idRedsocial!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>user : </i></b>
                </td>
                <td>{!!$redsocialusuario->user!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>pass : </i></b>
                </td>
                <td>{!!$redsocialusuario->pass!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection