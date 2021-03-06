@extends('scaffold-interface.layouts.app')
@section('title','Dashboard')
@section('content')
    <section class="content-header">
        <h1>
            Panell de control
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inici</a></li>
            <li class="active">Panell de control</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">

                        <div class="inner">
                            <a href="{{url('users')}}" style="color:white">
                            <h3>Usuaris</h3>
                            <p>{{$users}}</p>
                            </a>
                        </div>
                        <a href="{{url('users')}}">
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        </a>
                        <a href="{{url('users')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-red">--}}

                        {{--<div class="inner">--}}
                            {{--<a href="{{url('roles')}}" style="color:white">--}}
                            {{--<h3>Rols</h3>--}}
                            {{--<p>{{$roles}}</p>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="fa fa-user-plus"></i>--}}
                        {{--</div>--}}
                        {{--<a href="{{url('roles')}}" class="small-box-footer">Veure <i--}}
                                    {{--class="fa fa-arrow-circle-right"></i></a>--}}

                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-yellow">--}}

                        {{--<div class="inner">--}}
                            {{--<a href="{{url('permissions')}}" style="color:white">--}}
                            {{--<h3>Permisos</h3>--}}
                            {{--<p>{{$permissions}}</p>--}}
                            {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="fa fa-key"></i>--}}
                        {{--</div>--}}
                        {{--<a href="{{url('permissions')}}" class="small-box-footer">Veure <i--}}
                                    {{--class="fa fa-arrow-circle-right"></i></a>--}}

                {{--</div>--}}
            {{--</div>--}}
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">

                        <div class="inner">
                            <a href="{{url('categoria')}}" style="color:white">
                            <h3>Categories</h3>
                            <p>{{$categoria->count()}}</p>
                            </a>
                        </div>
                        <a href="{{url('categoria')}}">
                        <div class="icon">
                            <i class="fa fa-square"></i>
                        </div>
                        </a>
                        <a href="{{url('categoria')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-purple">

                        <div class="inner">
                            <a href="{{url('subcategoria')}}" style="color:white">
                            <h3>Subcategories</h3>
                            <p>{{$subcategoria->count()}}</p>
                            </a>
                        </div>
                        <a href="{{url('subcategoria')}}">
                        <div class="icon">
                            <i class="fa fa-square-o"></i>
                        </div>
                        </a>
                        <a href="{{url('subcategoria')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>

                </div>

            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-gray">
                        <div class="inner">
                            <a href="{{url('entidadorganizativa')}}" style="color:white">
                            <h3>Entitats Org.</h3>
                            <p>{{$entidadOrganizativa->count()}}</p>
                        </a>
                        </div>
                        <a href="{{ url('entidadorganizativa') }}">
                        <div class="icon" >
                            <i class="fa fa-briefcase"></i>
                        </div>
                        <a href="{{ url('entidadorganizativa') }}">
                        <a href="{{url('entidadorganizativa')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">

                        <div class="inner">
                            <a href="{{url('recurso')}}" style="color:white">
                            <h3>Recursos</h3>
                            <p>{{$recurso->count()}}</p>
                    </a>
                        </div>
                        <a href="{{url('recurso')}}">
                        <div class="icon">
                            <i class="fa fa-newspaper-o"></i>
                        </div>
                        </a>
                        <a href="{{url('recurso')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            {{--<div class="col-lg-3 col-xs-6">--}}
                {{--<!-- small box -->--}}
                {{--<div class="small-box bg-red">--}}

                        {{--<div class="inner">--}}
                            {{--<a href="{{url('fichero')}}" style="color:white">--}}
                            {{--<h3>Ficheros</h3>--}}
                            {{--<p>{{$fichero->count()}}</p>--}}
                    {{--</a>--}}
                        {{--</div>--}}
                        {{--<div class="icon">--}}
                            {{--<i class="fa fa-file"></i>--}}
                        {{--</div>--}}
                        {{--<a href="{{url('fichero')}}" class="small-box-footer">More info <i--}}
                                    {{--class="fa fa-arrow-circle-right"></i></a>--}}
                {{--</div>--}}
            {{--</div>--}}
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-orange">

                        <div class="inner">
                            <a href="{{url('tag')}}" style="color:white">
                            <h3>Tags</h3>
                            <p>{{$tag->count()}}</p>
                    </a>
                        </div>
                        <a href="{{url('tag')}}">
                        <div class="icon">
                            <i class="fa fa-hashtag"></i>
                        </div>
                        </a>
                        <a href="{{url('tag')}}" class="small-box-footer">Veure <i
                                    class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">

                    <div class="inner">
                        <a href="{{url('banner')}}" style="color:white">
                            <h3>Banners</h3>
                            <p>{{$banner->count()}}</p>
                        </a>
                    </div>
                    <a href="{{url('banner')}}">
                    <div class="icon">
                        <i class="fa fa-bullhorn"></i>
                    </div>
                    </a>
                    <a href="{{url('banner')}}" class="small-box-footer">Veure <i
                                class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>
            <!--<div class="col-lg-3 col-xs-6">
                <!-- small box 
                <div class="small-box bg-yellow">

                    <div class="inner">
                        <a href="{{url('evento')}}" style="color:white">
                            <h3>Eventos</h3>
                            <p>{{$evento->count()}}</p>
                        </a>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar"></i>
                    </div>
                    <a href="{{url('evento')}}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>

                </div>
            </div>-->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-blue">

                    <div class="inner">
                        <a href="{{url('redsocial')}}" style="color:white">
                            <h3>Xarxes socials</h3>
                            <p>{{$redsocial->count()}}</p>
                        </a>
                    </div>
                    <a href="{{url('redsocial')}}">
                    <div class="icon">
                        <i class="fa fa-twitter"></i>
                    </div>
                    </a>
                    <a href="{{url('redsocial')}}" class="small-box-footer">Veure <i
                                class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </section>
@endsection
