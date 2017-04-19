<div class="col-md-4 col-sm-4  no-padding">
    <div class="menu-post">
        <div class="post">
            <img class="img-responsive" src="{{ asset('./img/recursos/' . $recursoCategoria->img) }}" alt="" />
            <h3><a href="{{ url('recursos/'. $recursoCategoria->id) }}">{{$recursoCategoria->titulo}}</a></h3>
        </div>
    </div>
    <!-- End Menu Post -->
</div>
