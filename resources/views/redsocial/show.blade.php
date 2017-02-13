@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show redsocial
    </h1>
    <br>
    <form method = 'get' action = '{!!url("redsocial")!!}'>
        <button class = 'btn btn-primary'>redsocial Index</button>
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
                    <b><i>redSocial : </i></b>
                </td>
                <td>{!!$redsocial->redSocial!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>link : </i></b>
                </td>
                <td>{!!$redsocial->link!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection