@extends('fo.octagon_layout.octagon_master')

@section('content')

<div class="single-post">

    <!-- ___Start Article & Feature___ -->
    <div class="article-and-feature post-bottom-content bg-box-shadow each-section" data-scroll-index="0">
        <h3>{{$recurso->titulo}} <span class="mobile-bg">9<a class="mobile-bg" href="#0">9 comment</a></span></h3>
        <div class="meta-info">
            <p class="date"><i class="fa fa-clock-o"></i><a href="#0">{{$recurso->fechaPosteo}}</a></p>
            <p class="category"><i class="fa fa-bookmark"></i>  <a href="#0">mobile</a> </p>
            <p class="author"><i class="fa fa-user"></i> <a href="#0">by jenny doe</a></p>
        </div>
        <img class="img-responsive" src="{{ asset('img/recursos/'. $recurso->img) }}" alt="">

       <!-- ___Start Post___ -->
        <div class="article-content">
            <p>{!!$recurso->contenido!!}</p>
        </div>
        <!-- End Post -->

        <!-- ___Start Post Meta___ -->
        <div class="post-meta">
            <div class="share-icon">
                <i class="fa fa-share-alt"></i>
                <span>25 Share</span>
            </div>

            <div class="tags text-right">
                <ul class="tag-mobile">
                    <li><a>Tags :</a></li>
                    @foreach($recurso->tags as $tag)
                    <li><a href="{{ url('search/'. $tag->nombre) }}">{{$tag->nombre}}</a></li>
                    @endforeach
                </ul>
            </div><!-- End Tags -->
        </div><!-- End Meta Post -->
    </div><!-- End Article & Feature -->
</div>

@endsection