@extends('scaffold-interface.layouts.app')
@section('title','Show')
@section('content')

<section class="content">
    <h1>
        Show banner
    </h1>
    <br>
    <form method = 'get' action = '{!!url("banner")!!}'>
        <button class = 'btn btn-primary'>banner Index</button>
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
                    <b><i>img : </i></b>
                </td>
                <td>/img/banners/{!!$banner->img!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>url : </i></b>
                </td>
                <td>{!!$banner->url!!}</td>
            </tr>
            <tr>
                <td>
                    <b><i>activo : </i></b>
                </td>
                <td>{!!$banner->activo!!}</td>
            </tr>
        </tbody>
    </table>
</section>
@endsection