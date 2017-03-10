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
        Evento Index
    </h1>
    <div class="nav-tabs-custom">
        <ul class="nav nav-tabs">
            <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Lista</a></li>
            <li class="pull-right"><a href="#tab_2" data-toggle="tab" aria-expanded="false">Calendario</a></li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="tab_1">
                <form class = 'col s3' method = 'get' action = '{!!url("evento")!!}/create'>
                    <button class = 'btn btn-primary' type = 'submit'>Create New evento</button>
                </form>

                <br>
                <table  id="example1" class = "table table-striped table-bordered table-hover"      aria-describedby="example1_info" role="grid" style = 'background:#fff'>
                    <thead style="background-color:#ffccbc ">

                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                            colspan="1" aria-label="Rendering engine: activate to sort column descending"
                            style="width: 86px;" aria-sort="ascending">Titulo
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Browser: activate to sort column ascending" style="width: 110px;">
                            Descripcion
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Platform(s): activate to sort column ascending"
                            style="width: 95px;">Img
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="Engine version: activate to sort column ascending"
                            style="width: 71px;">Fecha Inicio
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 48px;">
                            Fecha Fin
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                            aria-label="CSS grade: activate to sort column ascending" style="width: 48px;">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($eventos as $evento)
                        <tr role="row" class="odd">
                            <td class="sorting_1">{!!$evento->titulo!!}</td>
                            <td>{!!$evento->descripcion!!}</td>
                            <td><a href="{!!$evento->img!!}">Imagen</a></td>
                            <td>{!!$evento->fechaInicio!!}</td>
                            <td>{!!$evento->fechaFin!!}</td>

                            <td>
                                <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/evento/{!!$evento->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                                <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/evento/{!!$evento->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
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