@extends('fo.octagon_layout.octagon_master')

@section('content')
    @if(isset($recursos) && !empty($recursos))
    <div class="col-md-9 w-100">
        <div class="row">
            @foreach($recursos as $recurso)
                    @include('fo.octagon_layout.octagon_content.octagon_recurso')
            @endforeach
        </div>
    </div>
    @else
        No hay recusos disponibles
    @endif

@endsection