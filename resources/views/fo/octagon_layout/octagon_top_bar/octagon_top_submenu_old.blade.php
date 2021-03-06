<!-- ___Start Menu Wrapper___ -->
<div class="menu-wrapper">
    <div class="post-tab container-fluid no-padding">
        <div role="tabpanel">
            <div class="row margin-zero">
                <div class="col-md-3 col-sm-3 no-padding">
                    <div class="submenu-lists">
                        <h4>{{$categoria->nombre}} News <i class="fa {{$categoria->logo}}"></i></h4>
                        <!-- ___Nav Tabs___ -->
                        <div class="nav nav-tabs">
                            @foreach($categoria->subcategorias as $subcategoria)
                                <div class="list" role="presentation"><a href="{{ url('recursos/subcategoria/' . $subcategoria->id) }}" aria-controls="beauty-care">{{$subcategoria->nombre}}</a></div>
                            @endforeach
                        </div><!-- End Nav Tab -->
                    </div><!-- End Sub Menu List -->
                </div><!-- End Column -->

                <div class="col-md-9 col-sm-9">
                    <!-- ___Tab Content___ -->
                    <div class="tab-content">
                        <!-- ___Tab Pane___ -->
                        <div role="tabpanel" class="tab-pane fade in active" id="beauty-care">
                            <div class="row">
                                <div class="col-md-4 col-sm-4  no-padding">
                                    <div class="menu-post">
                                        <div class="post">
                                            <img class="img-responsive" src="{{ asset('img/octagon/mm/mm-post-2.jpg') }}" alt="" />
                                            <h3><a href="#0">Roam roads covered by leafs</a></h3>
                                        </div>
                                    </div><!-- End Menu Post -->
                                </div>
                                <div class="col-md-4 col-sm-4  no-padding">
                                    <div class="menu-post">
                                        <div class="post">
                                            <img class="img-responsive" src="{{ asset('img/octagon/mm/mm-post-3.jpg') }}" alt="" />
                                            <h3><a href="#0">Wayne Rooney still troubled by groin injury</a></h3>
                                        </div>
                                    </div><!-- End Menu Post -->
                                </div>
                                <div class="col-md-4 col-sm-4  no-padding">
                                    <div class="menu-post">
                                        <div class="post">
                                            <img class="img-responsive" src="{{ asset('img/octagon/mm/mm-post-4.jpg') }}" alt="" />
                                            <h3><a href="#0">The world cup football match starts on march</a></h3>
                                        </div>
                                    </div><!-- End Menu Post -->
                                </div>
                            </div>
                        </div><!-- End Tab Panels -->
                    </div>
                    <!-- End Tab Content-->
                </div><!-- End Column -->
            </div><!-- End Row -->
        </div><!-- End Tab Panel -->
    </div><!-- End Post Tab -->
</div><!-- End Menu Wrapper -->