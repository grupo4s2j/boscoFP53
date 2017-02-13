@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show comentario
    </h1>
    <br>
    <form method = 'get' action = '{!!url("comentario")!!}'>
        <button class = 'btn btn-primary'>comentario Index</button>
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
                    <b><i>numero : </i></b>
                </td>
                <td>{!!$comentario->numero!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>nombre : </i></b>
                </td>
                <td>{!!$comentario->nombre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>email : </i></b>
                </td>
                <td>{!!$comentario->email!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>mensaje : </i></b>
                </td>
                <td>{!!$comentario->mensaje!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>aprobado : </i></b>
                </td>
                <td>{!!$comentario->aprobado!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>numContestado : </i></b>
                </td>
                <td>{!!$comentario->numContestado!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$comentario->activo!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>idRecurso : </i></b>
                </td>
                <td>{!!$comentario->idRecurso!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection