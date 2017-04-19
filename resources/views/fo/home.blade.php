@extends('fo.octagon_layout.octagon_master') 

@section('content')
<!-- ___Main Content___ -->
@if(isset($recursos) && !empty($recursos) && count($recursos) >= 1)
<div class="main-slider">
	<div class="row">
		<div class="col-md-12 no-padding">
			<div id="slider"> 
				@foreach($recursosTOP as $recurso)
				<div class="post item"><a href="{{ url('recursos/'. $recurso->id) }}"> <img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}" style="height: 443px; width: 1100px;"/></a>
					<div class="carousel-caption" style="background-color:#2a2f33;">
						<h3>{{$recurso->titulo}}</h3> 
					</div>
				</div> @endforeach </div>
		</div>
		<!--div class="col-md-4 no-padding">
			<div class="slider-side-post">
				@php $lastSoRecursos = array_slice($recursosTOP, -2, 2);@endphp @foreach($lastSoRecursos as $recurso)
				<div class="post"> <a href="{{ url('recursos/'. $recurso->id) }}"> <img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}"/> </a>
					<div class="post-info">
						<h3>{{$recurso->titulo}}</h3> </div>
				</div> @endforeach </div>
		</div-->
	</div>
</div>
@endif

<div class="main-post-body">
	
		<div class="col-md-9 no-padding w-100"> 
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
		<div class="text-center">
			<div class="col-md-3 w-50">
				<!-- ___Start Sidebar___ -->
				<div class="sidebar">
					<div id="calendar"></div>
					<div style="margin-top:10%;"><a class="twitter-timeline" data-lang="ca" data-width="700" data-height="600" data-theme="light" data-link-color="#E81C4F" href="https://twitter.com/TSFormacioInd" style="margin-left:8%;margin-top:2%;">Tweets by TSFI</a></div>
					<div style="margin-top:10%">
						@foreach($banners as $banner)
						<div class="banneritem">
							<a href="{{ url($banner->url) }}"> <img src="{{ asset('./img/banners/' . $banner->img) }}"> </a>
							<div class="clr"></div>
						</div>
						@endforeach 
					</div>
				</div>
			</div>
		</div>
	@if(isset($recursos) && !empty($recursos) && count($recursos) >= 1)
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
            {{ $recursos->links() }}
            </div>
        </div>
	@endif
</div>

@endsection


@section('scripts')

<script>
    $(document).ready(function () {
        $('#calendar').fullCalendar({
            height: 500,
            defaultView: 'listDay', 
            //defaultDate: '2017-03-12',
            monthNames: ['Gener', 'Febrer', 'Març', 'Abril', 'Maig', 'Juny', 'Juliol', 'Agost', 'Setembre', 'Octubre', 'Novembre', 'Desembre'],
            monthNamesShort: ['Gen', 'Feb', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Oct', 'Nov', 'Des'],
            dayNames: ['Diumenge', 'Dillluns', 'Dimarts', 'Dimecres', 'Dijous', 'Divendres', 'Dissabte'],
            dayNamesShort: ['Diu', 'Dill', 'Dima', 'Dime', 'Dij', 'Div', 'Dis'],
            navLinks: false, // can click day/week names to navigate views
            editable: false, 
			  columnFormat: 'ddd',
            eventLimit: true, // allow "more" link when too many events
            events: [
                    @foreach($eventos as $recurso)
                        
                            {
								title: '{{ $recurso->titulo }}', 
                                url: '{{ url('recursos/'. $recurso->id) }}', 
                                start: '{{ $recurso->fechaInicio }}', 
                                end: '{{ $recurso->fechaFin }}',
                            },
                       
                    @endforeach
            ]
        });
		$('.fc-list-item-time').hide();		
		$('.fc-today-button').click(function(){
						$('.fc-list-item-time').hide();		

				});		
    });
				
				
				
</script>

<style>
    #calendar {
        font-size: 10.8px;
        background-color: #fff;
    }

    .fc-left {
        font-size: 12px;
    }
    .fc-toolbar .fc-header-toolbar{
         font-size: 17px;
    }
</style>

@endsection