<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en" > <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title> Octagon : Trendy News Magazine </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

		<link rel="stylesheet" href="/css/octagon/highlight.css">			<!-- ===This Style sheet for Highlight === -->
		<link rel="stylesheet" href="/css/octagon/Pe-icon-7-stroke.css">			<!-- ===This Style sheet for Stoke Icon === -->
		<link rel="stylesheet" href="/css/octagon/meanmenu.css">				<!-- ===This Style sheet for Responsive Menu=== -->
		<link rel="stylesheet" href="/css/octagon/animate.css">				<!-- ===This Style sheet for Animations=== -->
		<link rel="stylesheet" href="/css/octagon/owl.carousel.css">			<!-- ===This Style sheet for Owl Carousel=== -->
		<link rel="stylesheet" href="/css/octagon/owl.theme.css">			<!-- ===This Style sheet for Owl Carousel=== -->
		<link rel="stylesheet" href="/css/octagon/font-awesome.min.css">		<!-- ===This Style sheet for Font Awesome fonts & icons=== -->
        <link rel="stylesheet" href="/css/octagon/bootstrap.min.css">		<!-- ===This Style sheet for Bootstrap classes=== -->
        <link rel="stylesheet" href="/css/octagon/style.css">				<!-- ===This Style sheet for Styling the full template=== -->
        <link rel="stylesheet" href="/css/octagon/responsive.css">			<!-- ===This Style sheet for making the template responsive for all devices=== -->
        <script src="/js/octagon/vendor/modernizr-2.6.2.min.js"></script>
        <script src="/js/octagon/jquery-3.1.1.js"></script>
    </head>
    <body>

		<!-- ___Start Home Three Page___ -->
		<div class="container-fluid home-3" id="container-full">
			<div class="row	">

				<!-- ___Start Left Menu___ -->
				@include('fo.octagon_layout.octagon_left_side')
				<!-- End Left Menu -->
				
				<!-- ___Start Column___ -->
				<div class="col-md-10 no-padding">
				
                    <!-- ___Start Top Bar___ -->
                    @include('fo.octagon_layout.octagon_top_bar.octagon_top_bar')
                    <!-- End Top Bar -->
				
                    <!-- ___Start Top Menu___ -->
                    @if(isset($categorias))
                        @include('fo.octagon_layout.octagon_top_bar.octagon_top_menu')
                    @endif
                    <!-- End Top Menu -->
                    
                    <!-- ___Start Column___ -->
                    <div class="main-content">
                        {{--@include('fo.octagon_layout.octagon_content')--}}
                        @yield('content')
                    </div>
                    <!-- End Column -->
                    
                    <!-- ___Start Top Bar___ -->
                    @include('fo.octagon_layout.octagon_footer.octagon_trend_post')
                    <!-- End Top Bar -->
				
                    <!-- ___Start Top Menu___ -->
                    @include('fo.octagon_layout.octagon_footer.octagon_bottom')
                    <!-- End Top Menu -->
                    
                    <!-- ___Start Top Menu___ -->
                    @include('fo.octagon_layout.octagon_footer.octagon_footer')
                    <!-- End Top Menu -->
                    
                </div><!-- ___End Column___ -->
			</div><!-- End Row -->
		</div><!-- End Container -->




        <script src="/js/octagon/vendor/jquery.min.js"></script>
        <script src="/js/octagon/scripts.js"></script>				<!-- ===This Script for Custom Script=== -->
        <script src="/js/octagon/owl.carousel.min.js"></script>			<!-- ===This Script for Owl Carousel=== -->
        <script src="/js/octagon/bootstrap.min.js"></script>			<!-- ===This Script for Bootstrap=== -->
        <script src="/js/octagon/wow.min.js"></script>				<!-- ===This Script for Wow JS=== -->
        <script src="/js/octagon/jquery.meanmenu.min.js"></script>		<!-- ===This Script for Main Menu=== -->
		<script src="/js/octagon/jquery.jscroll.js"></script>


		<script>
			jQuery(document).ready(function($) {
				jQuery('.category-nav ').meanmenu();
			});
		</script>

    </body>
</html>

