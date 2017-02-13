@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show tag
    </h1>
    <br>
    <form method = 'get' action = '{!!url("tag")!!}'>
        <button class = 'btn btn-primary'>tag Index</button>
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
                <td>{!!$tag->nombre!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>usado : </i></b>
                </td>
                <td>{!!$tag->usado!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection