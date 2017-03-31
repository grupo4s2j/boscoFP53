@extends('fo.octagon_layout.octagon_master')

@section('content')
    <div class="row">
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
                        @if(empty($recurso->fechaInicio) && empty($recurso->fechaFin))
                            @include('fo.octagon_layout.octagon_content.octagon_recurso')
                        @else
                            @include('fo.octagon_layout.octagon_content.octagon_evento')
                        @endif

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
    </div>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
        {{ $recursos->links() }}
        </div>
    </div>

@endsection