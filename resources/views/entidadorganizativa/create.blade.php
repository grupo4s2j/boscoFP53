@extends('scaffold-interface.layouts.app')
@section('title','Create')
@section('content')

    <section class="content">
        <h1>
            Crear entitat organitzativa
        </h1>
        <form method='get' action='{!!url("entidadorganizativa")!!}'>
            <button class='btn btn-danger'>Tornar al llistat</button>
        </form>
        <br>
        <form method='POST' action='{!!url("entidadorganizativa")!!}'>
            <input type='hidden' name='_token' value='{{Session::token()}}'>
            <div class="form-group">

                <label for="nombre">Nom</label>
                <input id="nombre" name="nombre" type="text" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="geolocalizacion">Direcció</label>
                <input id="address" name="direccion" type="text" class="form-control" placeholder="Direcció" required>
                <input id="geolocalizacion" name="geolocalizacion" type="text" class="form-control"
                       placeholder="Geoposició" required>
            </div>
            {{-- <div class="form-group">
                 <label for="activo">activo</label>
                 <input id="activo" name = "activo" type="text" class="form-control">
             </div>--}}
            <button class='btn btn-success ' type='submit'>Desar canvis</button>
            <div class="form-group" style="margin-top: 30px;">
                <label for="direccion">Buscar direcció</label>
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
        <script src='{{asset("/js/updateLocations.js")}}'></script>
    </section>
@endsection