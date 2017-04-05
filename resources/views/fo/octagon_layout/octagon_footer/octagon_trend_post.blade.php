<!-- ___Start Bottom trending post___ -->
<div class="bottom-trending-post">
    <h2 class="text-center">Trending Post</h2>
    <div id="trend-post" class="trend-post">

        @foreach($recursos as $recurso)
        <a href="{{ url('recursos/' . $recurso->id) }}">
        <div class="post item" style="width:225px; height:127px;background-image:url({{ asset('img/recursos/'. $recurso->img) }})">
            <!--<img class="img-responsive" style="width:100%; height:100%;" src="{{-- asset('img/recursos/'. $recurso->img) --}}" alt="" />-->
            <div class="overlay">
                <h3>{{$recurso->titulo}}</h3>
            </div>
        </div>
        </a>
        <!-- End Post -->
        @endforeach
        
    </div> <!-- End Trend Post -->
</div>
<!-- End Bottom Trending Post -->