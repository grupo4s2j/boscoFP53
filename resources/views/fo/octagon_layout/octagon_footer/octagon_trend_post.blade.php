<!-- ___Start Bottom trending post___ -->
<div class="bottom-trending-post">
    <h2 class="text-center">Trending Post</h2>
    <div id="trend-post" class="trend-post">

        @foreach($recursos as $recurso)
        <a href="{{ url('recursos/' . $recurso->id) }}">
            <div class="post item" style="height:127px;">
                @if(file_exists(asset('img/recursos/'. $recurso->img)))
                    <img class="img-responsive" style="width:100%; height:100%;" src="{{ asset('img/recursos/'. $recurso->img) }}  " alt="" />
                @else
                    <img class="img-responsive" style="width:100%; height:100%;" src="{{ asset('img/categorias/content_squares_fab_city.jpg') }}" alt="" />
                @endif
                
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