@extends('fo.octagon_layout.octagon_master')

@section('content')
    @if(isset($recursos) && !empty($recursos) && count($recursos) >= 1)
    <div class="col-md-12 w-100">
    <!--<div class="col-md-9 w-100">-->
            @php
                $i = 0
            @endphp
            @foreach($recursos as $recurso)
                @if($i == 0)
                    <div class="row">
                @endif
                    @include('fo.octagon_layout.octagon_content.octagon_recurso')
                @if($i == 1)
                    </div>
                @endif
                @php
                    $i == 1 ? $i = 0 : $i++
                @endphp
            @endforeach
    </div>
    @else
        No hay recusos disponibles
    @endif

@endsection