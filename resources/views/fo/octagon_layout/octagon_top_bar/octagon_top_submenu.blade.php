<!-- ___Start Menu Wrapper___ -->
<div class="menu-wrapper">
    <div class="post-tab container-fluid no-padding">
        <div role="tabpanel">
            <div class="row margin-zero">
                <div class="col-md-3 col-sm-3 no-padding">
                    <div class="submenu-lists">
                        <h4>{{$categoria->nombre}} Subcategories</h4>
                        <!-- ___Nav Tabs___ -->
                        <div class="nav nav-tabs">
                            @foreach($categoria->subcategorias as $subcategoria)
                                <div class="list" role="presentation"><a href="{{ url('recursos/subcategoria/' . $subcategoria->id) }}">{{$subcategoria->nombre}}</a></div>
                            @endforeach
                        </div><!-- End Nav Tab -->
                    </div><!-- End Sub Menu List -->
                </div><!-- End Column -->

                <div class="col-md-9 col-sm-9">
                    <!-- ___Tab Content___ -->
                    <div class="tab-content">
                        <!-- ___Tab Pane___ -->
                        <!--<div role="tabpanel" class="tab-pane fade in active" id="beauty-care">-->
                        <div role="tabpanel" class="tab-pane fade in active" id="{{$categoria->nombre}}">
                            <div class="row">
                                <!-- AQUI DEBE IR EL BUCLE DE LOS 3 MAX TOP RATED POSTS DE CADA CATEGORIA-->
                                @foreach($categoria->recursosCategoria as $recursoCategoria)
                                    @include('fo.octagon_layout.octagon_top_bar.octagon_top_menu_posts')
                                @endforeach
                            </div>
                        </div><!-- End Tab Panels -->
                    </div>
                    <!-- End Tab Content-->
                </div><!-- End Column -->
            </div><!-- End Row -->
        </div><!-- End Tab Panel -->
    </div><!-- End Post Tab -->
</div><!-- End Menu Wrapper -->