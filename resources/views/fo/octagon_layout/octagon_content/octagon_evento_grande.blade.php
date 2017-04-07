@extends('fo.octagon_layout.octagon_master') 

@section('content')

<div class="single-post">
    <!-- ___Start Article & Feature___ -->
    <div class="article-and-feature post-bottom-content bg-box-shadow each-section" data-scroll-index="0">
        <h3>{{$recurso->titulo}} <span class="mobile-bg">E<a class="mobile-bg" href="#0">Event</a></span></h3>
        <div class="meta-info">
            <p class="date"><i class="fa fa-clock-o"></i>{{$recurso->fechaI}} - {{$recurso->fechaF}}</p>
            <p class="category"><i class="fa fa-bookmark"></i>
                @foreach($recurso->subcategorias as $subcategoria)
                <a href="{{ url('/categorias/'.$subcategoria->id) }}">{{ $subcategoria->nombre }}</a> /
                @endforeach
            </p>
        </div>
        @if(file_exists(asset('img/recursos/'. $recurso->img)))
            <img class="img-responsive center-block" src="{{ asset('img/recursos/'. $recurso->img) }}" alt="">
        @else
            <img class="img-responsive center-block" src="{{ asset('img/recursos/'. $recurso->img) }}" alt="">
        @endif

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
    <div class="single-post-tab">
        <div role="tabpanel">
            <!-- ___Nav Tabs___ -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#responsive" aria-controls="responsive" role="tab" data-toggle="tab" aria-expanded="true">Entidad Organizativa</a></li>
                <li role="presentation" class=""><a href="#user-friendly" aria-controls="user-friendly" role="tab" data-toggle="tab" aria-expanded="false">Mapa</a></li>
            </ul>

            <!-- ___Tab Content___ -->
            <div class="tab-content">
                <!-- ___Tab Pane___ -->
                <div role="tabpanel" class="tab-pane fade active in" id="responsive">
                    <div class="row">
                        <div class="each-section single-post-author">
                            <div class="row">
                                <div class="col-lg-10 post-author-right col-lg-offset-2">
                                    <h4>{{$recurso->entidadorganizativa->nombre}}</h4>
                                    <p class="author-bio">{{$recurso->entidadorganizativa->breveDesc}}</p>
                                </div>

                            </div>
                            <!-- End Row -->
                            <!-- ___Start Address___ -->
                            <div class="row">
                                <div class="contact-address text-center">
                                    <div class="col-md-4 col-sm-4 address-width">
                                        <i class="pe-7s-map-2"></i>
                                        <p>{{$recurso->entidadorganizativa->direccion}}</p>
                                    </div>

                                    <div class="col-md-4 col-sm-4 address-width">
                                        <i class="pe-7s-mail-open-file"></i>
                                        <p>{{$recurso->entidadorganizativa->email}}</p>
                                    </div>

                                    <div class="col-md-4 col-sm-4 address-width">
                                        <i class="pe-7s-phone"></i>
                                        <p>{{$recurso->entidadorganizativa->telefono}}</p>
                                    </div>

                                </div>
                            </div>
                            <!-- End Row -->
                        </div>
                    </div><!-- End Row -->
                </div><!-- End Tab Pane -->

                <!-- ___Tab Pane___ -->
                <div role="tabpanel" class="tab-pane fade" id="user-friendly">
                    <div class="row">
                        
                    </div><!-- End Row -->
                </div><!-- End Tab Pane -->
            </div><!-- End Tab Content -->
        </div><!-- End Tab Panel -->
    </div>
    @endif
    <!-- End Single Post Tab -->
</div>

@endsection
