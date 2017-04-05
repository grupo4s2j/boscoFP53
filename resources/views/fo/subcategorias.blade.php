@extends('fo.octagon_layout.octagon_master') 
@section('content')
<section id="content-blocks">
    <div class="row" id="content-blocks-row">

        <!---------------------------------->

        @if(isset($categoria) && !empty($categoria) && count($categoria->subcategorias) > 0) 
            @foreach ($categoria->subcategorias as $subcategoria)
            <div class="col-md-3 col-sm-4" id="main-menu-button">
                <div class="content-blocks-button" style="height:216px;width:216px;">
                    <a href="{{ url('recursos/subcategoria/' . $subcategoria->id) }}">
                        <img src="{{ asset('./img/subcategorias/'. $subcategoria->img) }}" class="image-fade" style="height:100%;width:100%;">
                        <h2 class="content-blocks-text" style="font-size:24px;">{{$subcategoria->nombre}}</h2>
                    </a>
                </div>
            </div>
            @endforeach 
        @else 
            No hay subcategorias disponibles 
        @endif

        <!---------------------------------->

    </div>
    <!-- row-->
</section>
@endsection
