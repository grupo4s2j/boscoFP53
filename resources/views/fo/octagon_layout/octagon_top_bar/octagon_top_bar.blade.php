<!-- ___Start Top Bar___ -->
<div class="top-bar">
    <div class="top-bar-head">
        <div class="search" style="width:100%;">
            <form id="buscador" name="test-form" method="GET" action="{{ url('/search') }}">
                <input id="tags" name="search" type="text" class="form-control no-radius" placeholder="Search here |">
            </form>   
            <div class="search pull-right showSingle" style="width:73px;height:66px;">
                <i class="pe-7s-search"></i>
            </div>
            <div class="login-mail pull-right showSingle" id="2" style="width:73px;height:66px;">
                <i class="pe-7s-user"></i>
            </div>
        </div>
        
    </div>
    <!-- End Top Bar Head -->

    <!-- ___Start Top Bar Body___ -->
    <div class="top-bar-body">
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
    </div><!-- End Top Bar Body -->
</div><!-- ___Start Top Bar___ -->