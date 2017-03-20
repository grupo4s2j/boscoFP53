@extends('scaffold-interface.layouts.app')
@section('title','Edit')
@section('content')

<section class="content">
    <h1>
        Edit entidadorganizativa
    </h1>
    <form method = 'get' action = '{!!url("entidadorganizativa")!!}'>
        <button class = 'btn btn-danger'>entidadorganizativa Index</button>
    </form>
    <br>
    <form method = 'POST' action = '{!! url("entidadorganizativa")!!}/{!!$entidadorganizativa->
        id!!}/update'> 
        <input type = 'hidden' name = '_token' value = '{{Session::token()}}'>
        <div class="form-group">
            <label for="nombre">nombre</label>
            <input id="nombre" name = "nombre" type="text" class="form-control" value="{!!$entidadorganizativa->
            nombre!!}" required>
        </div>
        <div class="form-group">
            <label for="geolocalizacion">Direccion</label>
            <input id="address" name="direccion" type="text" class="form-control" placeholder="Direccion"  value="{!!$entidadorganizativa->
            direccion!!}"required>
            <input id="geolocalizacion" name="geolocalizacion" type="text" class="form-control" placeholder="Geoposicion"  value="{!!$entidadorganizativa->
            geolocalizacion!!}"required>

        </div>
        {{-- <div class="form-group">
             <label for="activo">activo</label>
             <input id="activo" name = "activo" type="text" class="form-control">
         </div>--}}
        <button class='btn btn-success ' type='submit'>Create</button>
        <div class="form-group">
            <label for="direccion">Buscar direccion</label>
            <div class="row-lg-12">
                <div class="col-lg-10">
                    <input id="input-address" name="direccion" type="text" class="form-control" >
                </div>
                <div class="col-lg-2">
                    <button id="search-address" type="button" class="btn btn-primary ">Buscar</button>

                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div id="gmap" class="mapHelper__div" style="width: 100%; height: 400px"></div>
                </div>
            </div>
        </div>
    </form>
    <script src="http://maps.google.com/maps/api/js?key=AIzaSyAv0cR_5TFppsd9IH6GBPhmXl6jL-R2KwQ"></script>
    <script src="/js/updateLocations.js"></script>
</section>
@endsection