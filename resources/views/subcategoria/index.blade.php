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
        Llistat subcategories
    </h1>
    <form class = 'col s3' method = 'get' action = '{!!url("subcategoria")!!}/create'>
        <button class = 'btn btn-primary' type = 'submit'>Crear nova subcategoria</button>
    </form>
    <br>
    <table  id="example1" class = "table table-striped table-bordered table-hover"      aria-describedby="example1_info" role="grid" style = 'background:#fff'>
        <thead style="background-color:#ffccbc ">

        <tr role="row">
            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                colspan="1" aria-label="Rendering engine: activate to sort column descending"
                style="width: 86px;" aria-sort="ascending">Subcategoria
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="Browser: activate to sort column ascending" style="width: 110px;">
                Categoria
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="Platform(s): activate to sort column ascending"
                style="width: 95px;">Imatge
            </th>
            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1"
                aria-label="CSS grade: activate to sort column ascending" style="width: 48px;">
                Accions
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($subcategorias as $subcategoria) 
            <tr role="row" class="odd">
                <td class="sorting_1" >{!!$subcategoria->nombre!!}</td>
                <td>{!!$subcategoria->categoria->nombre!!}</td>
                <td><a href="{{asset('img/subcategorias/')}}/{!!$subcategoria->img!!}">Imatge</a></td>
                <td>
                    <a data-toggle="modal" data-target="#myModal" class = 'delete btn btn-danger btn-xs' data-link = "/subcategoria/{!!$subcategoria->id!!}/deleteMsg" ><i class = 'material-icons'>Eliminar</i></a>
                    <a href = '#' class = 'viewEdit btn btn-primary btn-xs' data-link = '/subcategoria/{!!$subcategoria->id!!}/edit'><i class = 'material-icons'>Editar</i></a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</section>
@endsection