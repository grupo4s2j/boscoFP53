<!-- Start Menu Area -->
<div id="menu-area" class="menu-area toogle-sidebar-sections">
    <div class="menu-head">
        <a href="#0" class="accordion-toggle">Menu <span class="toggle-icon"><i class="fa fa-bars"></i></span></a>
        <div class="accordion-content">
            <div class="menu-body">
                <ul>
                    <li class="home"><a href="{{ url('/home') }}">Home</a>
                        <!--<ul class="drop-menu">
                            <li><a href="index.html">Home Layout - 1</a></li>
                            <li><a href="home-2.html">Home Layout - 2</a></li>
                            <li><a href="home-3.html">Home Layout - 3</a></li>
                            <li><a href="home-4.html">Home Layout - 4</a></li>
                            <li><a href="home-5.html">Home Layout - 5</a></li>
                            <li><a href="home-6.html">Home Layout - 6</a></li>
                        </ul><--></-->
                    </li>
                    <li class="sm-post"><a href="{{ url('/categorias') }}">Categorias</a>
                        <!--<ul class="drop-menu">
                            {{--@foreach($categorias as $categoria)--}}
                                <li><a href="#">{{--$categoria->nombre--}}</a></li>
                            {{--@endforeach--}}
                        </ul>-->
                    </li>
                    <li><a href="{{ url('/recursos') }}">Recursos</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div><!-- End Menu Body -->
        </div><!-- End According Content -->
    </div><!-- End Menu Head -->
</div>
<!-- End Menu Area -->