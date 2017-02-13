@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show fichero
    </h1>
    <br>
    <form method = 'get' action = '{!!url("fichero")!!}'>
        <button class = 'btn btn-primary'>fichero Index</button>
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
                    <b><i>url : </i></b>
                </td>
                <td>{!!$fichero->url!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>idRecurso : </i></b>
                </td>
                <td>{!!$fichero->idRecurso!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection