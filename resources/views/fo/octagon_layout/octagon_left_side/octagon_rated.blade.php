<!-- ___Start Top Rated Area___ -->
<div class="top-rated-area toogle-sidebar-sections">
    <div class="top-rated-head">
        <a href="#0" class="accordion-toggle">Top Rated <span class="toggle-icon"><i class="fa fa-bars"></i></span></a>
        <div class="accordion-content">

            <!-- ___Start Top Rated Body___ -->
            <div class="top-rated-body">
                @foreach($tags as $tag)
                    <a href="{{ url('search/tag/'. $tag->nombre) }}" class="top-rated-item {{$tag->color}}">
                        <div class="progress" style="width:60%">
                            <div class="progress-bar" role="progressbar" aria-valuenow="{{$tag->porcentaje}}" aria-valuemin="0" aria-valuemax="100" style="width: {{$tag->porcentaje}}%;">
                            </div>
                        </div>
                        <div class="top-rated-heading">{{$tag->nombre}}</div>

                        <div class="top-rated-count">
                            <div class="progress-score">
                                <i class="fa fa-eye"></i>
                                <span>{{$tag->usado}}</span>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div><!-- End Top Rated Body -->
        </div><!-- End Accordion Content -->
    </div><!-- End Top Rated Head -->
</div>
<!-- End Top Rated Area -->
