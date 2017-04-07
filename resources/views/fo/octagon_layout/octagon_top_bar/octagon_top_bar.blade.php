<!-- ___Start Top Bar___ -->
<div class="top-bar">
    <div class="top-bar-head">
        <div class="search">
            <i class="pe-7s-search showSingle" id="1"></i>
            <!--<p>what are you looking for?</p>-->
        </div>
        
        <div class="login-mail pull-right showSingle" id="2">
            <i class="pe-7s-user"></i>
        </div>
    </div>
    <!-- End Top Bar Head -->

    <!-- ___Start Top Bar Body___ -->
    <div class="top-bar-body">
        <div class="search-body targetDiv" id="div1">
            <p>Està buscant alguna cosa?</p>
            <form id="buscador" name="test-form" method="GET" action="{{ url('/search') }}">
                {{-- csrf_field() --}}
                <input id="tags" name="search" type="text" class="form-control no-radius" placeholder="Search here |">
                <button type="submit" value="Submit" class="btn btn-secondary btn-md">Submit</button>
            </form>
        </div>

        <!-- ___Start Top Bar Login Body___ -->
        <div class="user-body targetDiv" id="div2">
            <div class="row">
                <p>
                Canviar de rol a ...
                </p>
                @if($rol == 'profesor')
                    <form method="post" action="{{ url('rolchange')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="rol" value="alumno">
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-left:30px;">Pares/Alumnes</button>
                    </form>
                @elseif($rol == 'alumno')
                   <form method="post" action="{{ url('rolchange')}}">
                        {{ csrf_field() }}
                        <input type="hidden" name="rol" value="profesor">
                        <button type="submit" class="btn btn-primary btn-lg" style="margin-left:30px;">Professors/Orientadors</button>
                    </form>
                @endif
            </div>
        </div>
        <!-- End Top Bar Login Body -->

        <!-- ___Start Mail Body___ -->
        
        <!-- End Mail Body -->
    </div><!-- End Top Bar Body -->
</div><!-- ___Start Top Bar___ -->