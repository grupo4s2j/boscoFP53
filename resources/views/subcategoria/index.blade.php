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
        Subcategoria Index
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("subcategoria")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Create New subcategoria</button>
    </form>
    <br>
    {!! Form::open(['method'=>'GET','url'=>'subcategoria','class'=>'navbar-form navbar-right','role'=>'search'])  !!}
        <div class="input-group custom-search-form ">
            <input type="text" class="form-control" name="search" placeholder="Search...">
            <span class="input-group-btn">
                <button class="btn btn-default-sm" type="submit">
                    <a class="fa fa-search"></a>
                </button>
            </span>
        </div>

        {!! Form::close() !!}
        <form action="/subcategoria" method="Get">
           Mostrar  <select name="rows" id="rows" onchange="this.form.submit()">
                <?php
                if (isset($_GET['rows'])){?>
                <?php if( $_GET['rows']==5){echo '<option value="5" selected>5</option>';}else{  echo '<option value="5" >5</option>';} ?>
                <?php if( $_GET['rows']==10){echo '<option value="10" selected>10</option>';}else{  echo '<option value="10" >10</option>';} ?>
                <?php if( $_GET['rows']==20){echo '<option value="20" selected>20</option>';}else{  echo '<option value="20" >20</option>';} ?>
                <?php if( $_GET['rows']==50){echo '<option value="50" selected>50</option>';}else{  echo '<option value="50" >50</option>';} ?>
                <?php if( $_GET['rows']==100){echo '<option value="100" selected>100</option>';}else{  echo '<option value="100" >100</option>';} ?>
            <?php  }
                else{
            echo '<option value="5" selected="">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="50">50</option>
                        <option value="100">100</option>';
                }?>

            </select> filas.
        </form>
    <br>
    <table class = "table table-striped table-bordered table-hover" style = 'background:#fff'>
        <thead>
            <th>Nombre</th>
            <th>Categoría</th>
            {{--<th>Orden</th>--}}
            {{--<th>Activo</th>--}}
            <th>Img</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @foreach($subcategorias as $subcategoria) 
            <tr>
                <td>{!!$subcategoria->nombre!!}</td>
                <td>{!!$subcategoria->categoria->nombre!!}</td>
                <td>{!!$subcategoria->categoria->img!!}</td>
                {{--<td>{!!$subcategoria->orden!!}</td>--}}
                {{--<td>{!!$subcategoria->activo!!}</td>--}}
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/subcategoria/{!!$subcategoria->id!!}/deleteMsg" ><i class = 'material-icons'>delete</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/subcategoria/{!!$subcategoria->id!!}/edit'><i class = 'material-icons'>edit</i></a>
                    <a href = '#' class = 'viewShow btn btn-warning btn-xs' data-link = '/subcategoria/{!!$subcategoria->id!!}'><i class = 'material-icons'>info</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
    {!! $subcategorias->render() !!}

</section>
@endsection