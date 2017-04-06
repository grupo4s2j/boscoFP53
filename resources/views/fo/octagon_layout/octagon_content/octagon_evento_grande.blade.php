@extends('fo.octagon_layout.octagon_master') 

@section('content')

<div class="single-post">
    <!-- ___Start Article & Feature___ -->
    <div class="article-and-feature post-bottom-content bg-box-shadow each-section" data-scroll-index="0">
        <h3>{{$recurso->titulo}} <span class="mobile-bg">E<a class="mobile-bg" href="#0">Event</a></span></h3>
        <div class="meta-info">
            <p class="date"><i class="fa fa-clock-o"></i>{{$recurso->fechaPosteo}}</p>
            <p class="category"><i class="fa fa-bookmark"></i>
                @foreach($recurso->subcategorias as $subcategoria)
                <a href="{{ url('/categorias/'.$subcategoria->id) }}">{{ $subcategoria->nombre }}</a> /
                @endforeach
            </p>
        </div>
        <img class="img-responsive center-block" src="{{ asset('img/recursos/'. $recurso->img) }}" alt="">

        <!-- ___Start Post___ -->
        <div class="article-content">
            <p>{!!$recurso->contenido!!}</p>
        </div>
        <!-- End Post -->

        <!-- ___Start Post Meta___ -->
        <div class="post-meta">
            <!--<div class="share-icon">
                <i class="fa fa-share-alt"></i>
                <span>25 Share</span>
            </div>-->

            <div class="tags text-right">
                <ul class="tag-mobile">
                    <li><a>Tags :</a></li>
                    @foreach($recurso->tags as $tag)
                    <li><a href="{{ url('search/tag/'. $tag->nombre) }}">{{$tag->nombre}}</a></li>
                    @endforeach
                </ul>
            </div>
            <!-- End Tags -->
        </div>
        <!-- End Meta Post -->
    </div>
    <!-- End Article & Feature -->

    @if(!empty($recurso->entidadorganizativa))
    <div class="each-section single-post-author common-border">
        <div class="row">
            <div class="col-lg-2 post-author-left">
                <img src="images/article-sm.jpg" alt="">
            </div>
            <div class="col-lg-10 post-author-right">
                <h4>{{$recurso->entidadorganizativa->nombre}}</h4>
                <p class="author-bio">Phasellus dapibus ac quam placerat tincidunt. Praesent laoreet mattis odio ut hendrerit. Maecenas venenatis tristique vehicula. Sed faucibus ipsum.</p>
                <a href="#0" class="view-my-articles"><i class="fa fa-heart"></i>view my article</a>
            </div>

        </div>
        <!-- End Row -->
        <!-- ___Start Address___ -->
        <div class="row">
            <div class="contact-address text-center">
                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-map-2"></i>
                    <p>123 Web Street, Melbourne, <br>Australia.</p>
                </div>

                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-mail-open-file"></i>
                    <p>info@octagon.com</p>
                </div>

                <div class="col-md-4 col-sm-4 address-width">
                    <i class="pe-7s-phone"></i>
                    <p>+66 (0) 123 456 7890 <br> +66 (0) 123 456 8097</p>
                </div>

            </div>
        </div>
        <!-- End Row -->
    </div>
    @endif
</div>

@endsection
