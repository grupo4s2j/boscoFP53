@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show recursotag
    </h1>
    <br>
    <form method = 'get' action = '{!!url("recursotag")!!}'>
        <button class = 'btn btn-primary'>recursotag Index</button>
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
                <td>{!!$recursotag->idRecursos!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>idTag : </i></b>
                </td>
                <td>{!!$recursotag->idTag!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$recursotag->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection