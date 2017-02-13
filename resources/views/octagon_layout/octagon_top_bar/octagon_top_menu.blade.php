<!-- ___Start Category Nav___ -->
<div class="category-nav">
    <div id="mega-menu" class="mega-menu">
        <ul>
            <!-- ___Start Category Nav Life Style___ -->
            @foreach ($categorias as $categoria) 
                <li id="life-style" class="mega-menu-li {{$categoria->Color}}">
                    <a href="#0">{{$categoria->Nombre}}</a>
                    <ul>
                        <li>
                            @if(count($categoria->subcategorias()) > 0)
                                {{--$categoria->subcategorias()--}}
                            @endif
                        </li>
                    </ul>
                </li>
            @endforeach
            <!-- End Category Nav Life Style -->
        </ul>
    </div>
</div>
<!-- End Category Nav -->