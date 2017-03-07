<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <!-- After Selec2 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">-->
    <!-- Before Selec2 -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet"/>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/AdminLTE.min.css">
    <!-- Datepicker Files -->
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.css')}}">
    <link rel="stylesheet" href="{{asset('datePicker/css/bootstrap-datepicker3.standalone.css')}}">
    

    <!-- AdminLTE Skins. Choose a skin from the css/skins
    folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/css/skins/_all-skins.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">
    <header class="main-header">
        <!-- Logo -->
        <a href="{{url('dashboard')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>B</b>FP</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>BoscoFP</b></span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Notification Navbar List-->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label notification-label">new</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Your notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu notification-menu">
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- END notification navbar list-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="user-image"
                                 alt="User Image">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header">
                                <img src="http://ahloman.net/wp-content/uploads/2013/06/user.jpg" class="img-circle"
                                     alt="User Image">
                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a href="{{url('logout')}}" class="btn btn-default btn-flat"
                                       onclick="event.preventDefault();
											document.getElementById('logout-form').submit();">Sign out</a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
							<span class="input-group-btn">
								<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                            class="fa fa-search"></i>
                                </button>
							</span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li {{{ (Request::is('dashboard') ? 'class=active' : '') }}}>
                    <a href="{{url('dashboard')}}">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span></i>
                    </a>
                </li>
                <li {{{ (Request::is('categoria') ? 'class=active' : '') }}}><a href="{{url('/categoria')}}"><i
                                class='fa fa-square'></i> <span>Categorías</span></a></li>
                <li {{{ (Request::is('subcategoria') ? 'class=active' : '') }}}><a href="{{ url('/subcategoria') }}"><i
                                class='fa fa-square-o'></i> <span>Subcategorías</span></a></li>
                <li {{{ (Request::is('entidadorganizativa') ? 'class=active' : '') }}}><a
                            href="{{ url('entidadorganizativa') }}"><i class='fa
fa-briefcase'></i> <span>Entidades organizativas</span></a></li>
                <li {{{ (Request::is('recurso') ? 'class=active' : '') }}}><a href="{{ url('recurso') }}"><i
                                class='fa fa-newspaper-o'></i> <span>Recursos</span></a></li>
                <li {{{ (Request::is('fichero') ? 'class=active' : '') }}}><a href="{{ url('fichero') }}"><i class='fa
fa-file'></i> <span>Ficheros</span></a></li>
                <li {{{ (Request::is('tag') ? 'class=active' : '') }}}><a href="{{ url('tag') }}"><i
                                class='fa fa-hashtag'></i> <span>Tags</span></a></li>
                <li {{{ (Request::is('banner') ? 'class=active' : '') }}}><a href="{{ url('banner') }}"><i
                                class='fa fa-bullhorn'></i> <span>Banners</span></a></li>
                <li {{{ (Request::is('evento') ? 'class=active' : '') }}}><a href="{{ url('evento') }}"><i
                                class='fa fa-calendar'></i> <span>Eventos</span></a></li>
                <li {{{ (Request::is('redsocial') ? 'class=active' : '') }}}><a href="{{ url('redsocial') }}"><i
                                class='fa fa-twitter'></i> <span>Redes Sociales</span></a></li>
                <li class="header">ADMINISTRATOR</li>
                <li class="treeview"><a href="{{url('/users')}}"><i class="fa fa-users"></i> <span>Users</span></a></li>
                <li class="treeview"><a href="{{url('/roles')}}"><i class="fa fa-user-plus"></i> <span>Role</span></a>
                </li>
                <li class="treeview"><a href="{{url('/permissions')}}"><i class="fa fa-key"></i>
                        <span>Permissions</span></a></li>
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class='AjaxisModal'>
    </div>
</div>
<!-- Compiled and minified JavaScript -->

<!-- After select2 <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>-->
<!-- Before select2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<!-- /Before select2-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/app.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/2.3.5/js/demo.js"></script>
<script> var baseURL = "{{ URL::to('/') }}"</script>
<script src="{{URL::asset('js/AjaxisBootstrap.js') }}"></script>
<script src="{{URL::asset('js/scaffold-interface-js/customA.js') }}"></script>
<script src="https://js.pusher.com/3.2/pusher.min.js"></script>
<script src="{{ asset('/ckeditor/ckeditor.js') }}"></script>
<!-- Datepicker Files -->
<script src="{{asset('datePicker/js/bootstrap-datepicker.js')}}"></script>
<!-- Languaje -->
<script src="{{asset('datePicker/locales/bootstrap-datepicker.es.min.js')}}"></script>
<script>
    // pusher log to console.
    Pusher.logToConsole = true;
    // here is pusher client side code.
    var pusher = new Pusher("{{env("PUSHER_KEY")}}", {
        encrypted: true
    });
    var channel = pusher.subscribe('test-channel');
    channel.bind('test-event', function (data) {
        // display message coming from server on dashboard Notification Navbar List.
        $('.notification-label').addClass('label-warning');
        $('.notification-menu').append(
                '<li>\
                            <a href="#">\
                                        <i class="fa fa-users text-aqua"></i> ' + data.message + '\
						</a>\
			</li>'
        );
    });
</script>
<script>


    if (typeof data !== 'undefined') {

        var $element = $('#tag_list').select2();
        //[{"id": "1", "text": "One"}, {"id": "2", "text": "Two"}]
        for (var d = 0; d < data.length; d++) {
            var item = data[d];

            // Create the DOM option that is pre-selected by default
            var option = new Option(item.text, item.text, true, true);

            // Append it to the select
            $element.append(option);
        }

        // Update the selected options that are displayed
        $element.trigger('change');
    }
    $('#tag_list').select2({
        //placeholder: "Choose tags...",
        tags: true,
        tokenSeparators: [',', ' '],
        minimumInputLength: 2,

        ajax: {
            url: '/tag/find',
            dataType: 'json',
            data: function (params) {

                return {
                    q: $.trim(params.term)
                };
            },
            processResults: function (data) {
                return {
                    results: data
                };

            },
            cache: true
        }

    });

    /*http://laraget.com/blog/select2-and-laravel-ajax-autocomplete*/
    /*http://jsfiddle.net/X6V2s/66/*/
</script>
<script>
    $('.datepicker').datepicker({
        format: "yyyy/mm/dd",
        language: "es",
        autoclose: true
    });
</script>
<script>
   var fixHelperModified = function (e, tr) {
                var $originals = tr.children();
                var $helper = tr.clone();
                $helper.children().each(function (index) {
                    $(this).width($originals.eq(index).width())
                });
                return $helper;
            },
            updateIndex = function (e, ui) {
                var data = $(this).sortable('serialize');
                //save_sortable(data);
                $('td.orden', ui.item.parent()).each(function (i) {
                    $(this).html(i + 1);

                });
            };

    $("#taula tbody").sortable({
        helper: fixHelperModified,
        stop: updateIndex
    }).disableSelection();
    function save_sortable(serial)
    {
        $.ajax({
            url: "save.php",
            type: 'POST',
            data: serial,
            success: function (data) {
                alert(data);
            },
            error: function(){
                alert("theres an error with AJAX");
            }

        });
    }
   //$( "tbody" ).sortable();*/



</script>
</body>
</html>
