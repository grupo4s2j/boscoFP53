<!-- ___Start Bottom trending post___ -->
<div class="bottom-trending-post">
    <h2 class="text-center">Random Post</h2>
    <div id="trend-post" class="trend-post">

        @foreach($recursos as $recurso)
        <a href="{{ url('recursos/' . $recurso->id) }}">
            <div class="post item" style="height:127px;">
                <img class="img-responsive" style="width:100%; height:100%; opacity:0.5; background:" src="{{ asset('img/recursos/'. $recurso->img) }}  "/>
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