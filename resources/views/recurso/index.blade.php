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
            Recurso Index
        </h1>
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Lista</a></li>
                <li class="pull-right"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Calendario</a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="tab_1">
                    <form class='col s3' method='get' action='{!!url("recurso")!!}/create'>
                        <button class='btn btn-primary' type='submit'>Create New recurso</button>
                    </form>
                    <br>
                    <table id="example1" class="table table-striped table-bordered table-hover"
                           aria-describedby="example1_info" role="grid" style='background:#fff'>
                        <thead style="background-color:#ffccbc ">

                        <tr role="row">
                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                colspan="1" aria-label="Rendering engine: activate to sort column descending"
                                style="width: 86px;" aria-sort="ascending">titulo
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Browser: activate to sort column ascending" style="width: 110px;">
                                descripcion
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Platform(s): activate to sort column ascending"
                                style="width: 95px;">img
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="Engine version: activate to sort column ascending"
                                style="width: 71px;">fechaPost
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 48px;">
                                EntidadOrganizativa
                            </th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                                aria-label="CSS grade: activate to sort column ascending" style="width: 48px;">
                                actions
                            </th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($recursos as $recurso)
                            <tr role="row" class="odd">
                                <td class="sorting_1">{!!$recurso->titulo!!}</td>
                                <td>{!!$recurso->descripcion!!}</td>
                                <!--<td>{/*!!$recurso->contenido!!*/}</td>-->
                                <td><a href="{{asset('img/recursos/')}}/{!!$recurso->img!!}">Imagen</a></td>
                                {{--<td><img src="{!!$recurso->img!!}" style="width: 100px; height: 100px;"></img></td>--}}
                                <td>{!!$recurso->fechaPost!!}</td>
                                {{--<td>{!!$recurso->fechaInicio!!}</td>--}}
                                {{--<td>{!!$recurso->fechaFin!!}</td>--}}
                                {{--<td>{!!$recurso->rangoEdad!!}</td>--}}
                                {{--<td>{!!$recurso->relevancia!!}</td>--}}
                                <td>{!!$recurso->nombre!!}</td>
                                {{--<td>{!!$recurso->activo!!}</td>--}}
                                <td>
                                    <a data-toggle="modal" data-target="#myModal" class='delete btn btn-danger btn-xs'
                                       data-link="/recurso/{!!$recurso->id!!}/deleteMsg"><i class='material-icons'>eliminar</i></a>
                                    <a href='#' class='viewEdit btn btn-primary btn-xs'
                                       data-link='/recurso/{!!$recurso->id!!}/edit'><i
                                                class='material-icons'>edit</i></a>
                                    <a href='#' class='viewShow btn btn-warning btn-xs'
                                       data-link='/recurso/{!!$recurso->id!!}'><i
                                                class='material-icons'>info</i></a>
                                    @if($recurso->show== 0)
                                        <a href='#' class='viewShow btn btn-success btn-xs'
                                           data-link='/recurso/{!!$recurso->id!!}/enable'><i

                                                    class='material-icons'>ver</i></a>
                                    @else
                                        <a href='#' class='viewShow btn btn-success btn-xs'
                                           data-link='/recurso/{!!$recurso->id!!}/disable'><i

                                                    class='material-icons'>ocultar</i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    {{--{!! $recursos->render() !!}--}}
                </div>
                <!-- /.tab-pane -->
                <div class="tab-pane" id="tab_2">
                    <iframe src="./calendar" width="100%" height="750px" frameBorder="0">

                    </iframe>
                </div>

                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
        </div>
    </section>
@endsection
