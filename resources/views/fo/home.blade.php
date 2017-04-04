@extends('fo.octagon_layout.octagon_master')


@section('content')

<div class="main-slider">
	<div class="row">
		<div class="col-md-8 no-padding">
			<div id="slider"> @php $firstFiveRecursos = array_slice($recursosTOP, 0, 5);@endphp @foreach($firstFiveRecursos as $recurso)
				<div class="post item"><a href="{{ url('recursos/'. $recurso->id) }}"> <img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}"/></a>
					<div class="carousel-caption">
						<h3>{{$recurso->titulo}}</h3> </div>
				</div> @endforeach </div>
		</div>
		<div class="col-md-4 no-padding">
			<div class="slider-side-post"> @php $lastSoRecursos = array_slice($recursosTOP, -2, 2);@endphp @foreach($lastSoRecursos as $recurso)
				<div class="post"> <a href="{{ url('recursos/'. $recurso->id) }}"> <img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}"/> </a>
					<div class="post-info">
						<h3>{{$recurso->titulo}}</h3> </div>
				</div> @endforeach </div>
		</div>
	</div>
</div>
<div class="main-post-body">
	<div class="row">
		<div class="col-md-9 no-padding w-100"> @if(isset($lastestRecurso) && !empty($lastestRecurso) && count($lastestRecurso) >= 1)
			<div class="col-md-12 w-100"> @php $i = 0 @endphp @foreach($lastestRecurso as $recurso) @if($i == 0)
				<div class="row"> @endif @include('fo.octagon_layout.octagon_content.octagon_recurso') @if($i == 1) </div> @endif @php $i == 1 ? $i = 0 : $i++ @endphp @endforeach </div> @else No hay recusos disponibles @endif </div>
		<div class="text-center">
			<div class="col-md-3 w-50">
				<!-- ___Start Sidebar___ -->
				<div class="sidebar">
					<div id="calendar"></div>
					<div style="margin-top:10%;"><a class="twitter-timeline" data-lang="ca" data-width="700" data-height="600" data-theme="light" data-link-color="#E81C4F" href="https://twitter.com/TSFormacioInd" style="margin-left:8%;margin-top:2%;">Tweets by TSFI</a></div>
					<div style="margin-top:10%">
						@foreach($banners as $banner)
						<div class="banneritem">
							<a href="{{ url($banner->url) }}"> <img src="{{ asset('./img/banners/' . $banner->img) }}" alt="sharetheligth"> </a>
							<div class="clr"></div>
						</div>
						@endforeach 
					</div>
				</div>
			</div>
		</div>
	</div>
</div> @endsection