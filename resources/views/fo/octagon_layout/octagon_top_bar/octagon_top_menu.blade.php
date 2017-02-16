<!-- ___Start Category Nav___ -->
<div class="category-nav">
    <div id="mega-menu" class="mega-menu">
        <ul id="myList">
            <!-- ___Start Category Nav Life Style___ -->
            @foreach ($categorias as $categoria) 
                <li id="life-style" class="mega-menu-li {{$categoria->color}}" style="display:none;">
                    <a href="#0">{{$categoria->nombre}}</a>
                    <ul>
                        <li>
                            @if(count($categoria->subcategorias) > 0)
                                @include('fo.octagon_layout.octagon_top_bar.octagon_top_submenu')
                            @endif
                        </li>
                    </ul>
                </li>
            @endforeach
            <!-- End Category Nav Life Style -->
        </ul>
        @if(count($categorias) > 8)
            <ul>        
                <div class="load-more load-more-btn scroll" style="cursor:pointer;">
                    <div id="loadMore" class="morebtn text-center">Load more</div>
                </div>
            </ul>
        @endif
    </div>
</div>
<!-- End Category Nav -->
<script>
$(document).ready(function () {
    $('#myList > li').hide();
    size_li = $("#myList > li").length;
    x=8;
    $('#myList > li:lt('+x+')').show();
    $('#loadMore').click(function () {
        if(x != size_li){
            //x= (x+5 <= size_li) ? x+5 : size_li;
            x = size_li;
            $('#myList > li:lt('+size_li+')').show();
            $('#loadMore').text('Load Less');
        }else if(x == size_li){
            //x=(x-5<0) ? 6 : x-5;
            x = 8;
            $('#myList > li').not(':lt('+x+')').hide();
            $('#loadMore').text('Load More');
        }
        
    });
});
</script>