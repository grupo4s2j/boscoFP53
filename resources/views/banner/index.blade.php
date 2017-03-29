@extends('scaffold-interface.layouts.app')
@section('title','Index')
@section('content')
     <?php // number of rows per page
    $rowperpage = 5;
    if (isset($_POST['num_rows'])) {
        $rowperpage = $_POST['num_rows'];
    }?>
<section class="content">
    <h1>
        Banner Index
    </h1>

    <br>


    <br>
    <table  id="example1" class = "table table-striped table-bordered table-hover"      aria-describedby="example1_info" role="grid" style = 'background:#fff'>
        <thead style="background-color:#ffccbc ">
            <th>img</th>
            <th>url</th>
            {{--<th>activo</th>--}}
            <th>actions</th>
        </thead>
        <tbody>
            @foreach($banners as $banner) 
            <tr>
                <td><img src="{{asset('img/banners/')}}/{!!$banner->img!!}" style="height: 100px; width: 100px;"></img></td>
                <td>{!!$banner->url!!}</td>
                {{--<td>{!!$banner->activo!!}</td>--}}
                <td>
                    {{--<a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/banner/{!!$banner->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>--}}
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/banner/{!!$banner->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    {{--<a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/banner/{!!$banner->id!!}'><i class = 'material-icons'>info</i></a>--}}
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $banners->render() !!}

</section>
@endsection