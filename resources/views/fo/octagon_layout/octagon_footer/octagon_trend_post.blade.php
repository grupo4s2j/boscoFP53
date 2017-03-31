<!-- ___Start Bottom trending post___ -->
<div class="bottom-trending-post">
    <h2 class="text-center">Trending Post</h2>
    <div id="trend-post" class="trend-post">

       @foreach($recursos as $recurso)
        <div class="post item" style="width:225px; height:127px;">
            <img class="img-responsive" style="max-width:100%; max-height:100%;" src="{{ asset('img/recursos/'. $recurso->img) }}" alt="" />
            <div class="overlay">
                <h3>{{$recurso->titulo}}</h3>
            </div>
        </div>
        <!-- End Post -->
        @endforeach
        
    </div> <!-- End Trend Post -->
</div>
<!-- End Bottom Trending Post -->