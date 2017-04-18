<!-- ___Start Left Menu___ -->
<div class="col-md-2 no-padding">
    <div id="left-sidebar">
       <!-- Start Sidebar Menu -->
        <div class="sidebar-menu">
            <div class="logo">
                <a href="{{ url('home') }}"><img src="{{ asset('/img/octagon/logo.png') }}" style="height: 224px;"/></a>

                <!--a href="index"><img src="/img/octagon/logo.png" alt="Bosco FP"></a-->

            </div><!-- End Logo -->
            @include('fo.octagon_layout.octagon_left_side.octagon_menu')
            {{--@include('fo.octagon_layout.octagon_left_side.octagon_posts')--}}
            @if(!empty($tags))
                @include('fo.octagon_layout.octagon_left_side.octagon_rated')
            @endif
            {{--@include('fo.octagon_layout.octagon_left_side.octagon_follow')--}}
        </div>
        <!-- End Sidebar Menu -->
    </div>
</div>
<!-- End Left Menu -->