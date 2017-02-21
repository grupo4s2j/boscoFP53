@extends('fo.octagon_layout.octagon_master')

@section('content')
    <section id="content-blocks">
        <div class="row" id="content-blocks-row">

<!-------------------------------->	

            @foreach ($categorias as $categoria)
                <div class="col-md-3 col-sm-4" id="main-menu-button">
                    <div class="content-blocks-button">

                    <a href="#"><img src="{{$categoria->img}}" class="image-fade">
                    <h2 class="content-blocks-text" style="font-size:24px;">{{$categoria->nombre}}</h2></a>  

                    </div> 
                </div>	
            @endforeach

<!---------------------------------->	

        </div> <!-- row-->			    					                                     	 
    </section>
    <script type="application/javascript">
        $("a h2").hover(function(){
           $(this).animate({fontSize: "26px"}, 400)
       }, function() {
          $(this).animate({fontSize: "24px"}, 400)  
        })
    </script>
@endsection
