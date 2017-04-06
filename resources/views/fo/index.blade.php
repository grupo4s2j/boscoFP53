<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>TSFI - Taules vectorial formació industrial</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/stylish_portfolio/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/stylish_portfolio/stylish-portfolio.css') }}" rel="stylesheet">

    <!-- CSS del Aviso de cookies -->
    <link href="{{ asset('css/avisocookies.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('fonts/stylish_portfolio/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body class="colorear negro">

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <img src="{{ asset('./img/octagon/logo.png') }}" style="height:200px">
            <h2 style="color:white;"><b>Formaci&oacute; industrial</b></h2>
            <br>
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-2" style="height:146px; padding-top:50px;">
                        <form method="post" action="{{ url('/rol')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="rol" value="alumno">
                            <button type="submit" class="btn btn-secundary btn-lg" style="color:black;">Pares/Alumnes</button>
                        </form>
                    </div>
                    <div class="col-md-4" style="height:146px; padding-top:50px;">
                        <form method="post" action="{{ url('/rol')}}">
                            {{ csrf_field() }}
                            <input type="hidden" name="rol" value="profesor">
                            <button type="submit" class="btn btn-secundary btn-lg" style="color:black;">Professors/Orientadors</button>
                        </form>
                    </div>
                </div>
            </div>
            <aside id="avisocookies">
                    Esta pagina utiliza cookies propias con el fin de mejorar el servicio. Si continuas navegando, aceptas su uso. Para mas informacion <a href="http://politicadecookies.com" rel="nofollow">clicka aqui</a>. 
                    <button class="btn btn-primary" id="aceptarcookies" style="margin-left: 15px;">Aceptar</button>
        	</aside>
        </div>
        
    </header>
    
    <!-- jQuery -->
    <script src="{{ asset('js/stylish_portfolio/jquery.js') }}"></script>

    <!-- JS aviso cookies -->
    <script src="{{ asset('js/avisocookies.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/stylish_portfolio/bootstrap.min.js') }}"></script>
</body>

</html>