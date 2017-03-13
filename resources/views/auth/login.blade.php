<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- Scripts -->
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Open+Sans:600'>

    <link rel="stylesheet" href="css/style_login.css">


</head>

<body class ="colorear negro">
<!--<img style="   min-height:100%;
    min-width:100%;
    height:auto;
    width:auto;
    position:absolute;
    top:-100%; bottom:-100%;
    left:-100%; right:-100%;
    margin:auto; " src="http://i.imgur.com/5NK0H1e.jpg" alt="">-->
<div class="login-wrap">
    <div class="login-html">
        <input id="tab-1" type="radio" name="tab" class="sign-in" checked><label for="tab-1" class="tab"><a href="index"><img src="{{ asset('/img/octagon/logo.png') }}" style="height: 80px;"/></a></label>
        <input id="tab-2" type="radio" name="tab" class="sign-up"><label for="tab-2" class="tab">  <!-- Sign Up --> </label>

        <div class="login-form">

            <div class="sign-in-htm">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}
                    <div class="group">
                        <label for="email" class="label">Direccio e-mail</label>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required
                               autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Contrasenya</label>

                        <input id="password" type="password" class="input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="group">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordar contrasenya
                        </label>
                    </div>
                    <div class="group">
                        <input type="submit" class="button" value="Acceptar">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <a class="btn btn-link" href="{{ url('/password/reset') }}">
                           <!-- Forgot Your Password?-->
                        </a>
                    </div>

                </form>
            </div>

            <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                {{ csrf_field() }}
                <div class="sign-up-htm">
                    <div class="group">
                        <label for="user" class="label">Name</label>

                        <input id="name" type="text" class="input" name="name" value="{{ old('name') }}" required
                               autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Email Address</label>
                        <input id="email" type="email" class="input" name="email" value="{{ old('email') }}" required>

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Password</label>
                        <input id="pass" type="password" class="input" data-type="password" required>
                        <!--   <input id="pass" type="password" class="form-control" name="password" required> -->

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="group">
                        <label for="pass" class="label">Repeat Password</label>
                        <input id="pass" type="password" class="input" data-type="password" required>
                        <!-- <input id="pass" type="password" class="input" data-type="password"> -->

                    </div>

                    <div class="group">
                        <input type="submit" class="button" value="Sign Up">
                    </div>
                    <div class="hr"></div>
                    <div class="foot-lnk">
                        <label for="tab-1">Already Member?</label>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>
