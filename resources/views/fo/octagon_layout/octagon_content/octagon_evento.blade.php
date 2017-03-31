<div class="col-md-6">
    <div class="post-bottom-content">
        <a href="{{ url('recursos/' . $recurso->id) }}"><img class="img-responsive" src="{{ asset('./img/recursos/' . $recurso->img) }}" alt=""></a>
        <a href="{{ url('recursos/'. $recurso->id) }}"><h3>{{$recurso->titulo}}</h3></a>
        <h3><span class="mobile-bg">E<a class="mobile-bg" href="{{ url('recursos/'. $recurso->id) }}">Event</a></span></h3>
        <span class="date">{{$recurso->fechaPosteo}}</span>
        <span class="date">{{$recurso->fechaI}}</span>
        <span class="date">{{$recurso->fechaF}}</span>

        <!-- ___Post Meta___ -->
        <div class="article-and-feature post-meta">
            <div class="tags text-right">
                <ul class="tag-mobile">
                    @foreach($recurso->tags as $tag)
                    <li><a href="{{ url('search/tag/'. $tag->nombre) }}">{{$tag->nombre}}</a></li>
                    @endforeach
                </ul>
            </div><!-- End Tags -->
        </div>
    </div><!-- End Post Bottom Content -->
</div>