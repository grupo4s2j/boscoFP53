<div class="col-md-6">
    <div class="post-bottom-content">
        <a href="{{ url('recursos/' . $recurso->id) }}"><img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}" alt=""></a>
        <a href="{{ url('recursos/'. $recurso->id) }}"><h3>{{$recurso->titulo}}</h3></a>
        <h3><span class="mobile-bg">E<a class="mobile-bg" href="{{ url('recursos/'. $recurso->id) }}">Event</a></span></h3>
        <span class="date">{{$recurso->fechaPosteo}}</span>
        <span class="date">{{$recurso->fechaInicio}}</span>
        <span class="date">{{$recurso->fechaFin}}</span>

        <!-- ___Post Meta___ -->
        <div class="post-meta">
            <a href="#0" class="share-icon">
                <i class="fa fa-share-alt"></i>
                <span>25 Share</span>
            </a>
            <a href="#0" class="category-icon pull-right">
                <span>Travel</span>
                <i class="fa fa-plane"></i>
            </a>
            <!--<div class="tags text-right">
                <ul class="tag-mobile">
                    @if(count($recurso->tags) > 0)
                        @foreach($recurso->tags as $tag)
                        <li><a href="{{ url('search/tag/'. $tag->nombre) }}">{{$tag->nombre}}</a></li>
                        @endforeach
                    @endif
                </ul>
            </div>--><!-- End Tags -->
        </div>
    </div><!-- End Post Bottom Content -->
</div>