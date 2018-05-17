<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="{{asset('assets/img/favicon.ico')}}">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Seguimiento</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="{{asset('assets/css/animate.min.css')}}" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="{{asset('assets/css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{asset('assets/css/demo.css')}}" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="{{asset('assets/css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
	<style>
     .breadcrumb
     {
        background: #e8e8e8!important;
     } 

     .breadcrumb a
     {
        color:#17b4d4;
     }  

    </style>
    @yield('css')
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="{{asset('assets/img/sidebar-5.jpg')}}">

    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="{{url('home')}}" class="simple-text">
                    MathiasDiaz.uy
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="{{url('home')}}">
                        <i class="pe-7s-users"></i>
                        <p>Personas</p>
                    </a>
                </li>
                <li>
                    <a href="{{url('category')}}">
                        <i class="pe-7s-box1"></i>
                        <p>Categorias</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">
                        <i class="pe-7s-power"></i>
                        <p>Cerrar Sesión</p>
                    </a>    
                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a style="margin:0;">
                            <form action="{{url('search')}}" method="POST" class="form-inline">
                                @csrf
                                <div class="form-group">
                                    <i class="fa fa-search"></i>
                                    <p class="hidden-lg hidden-md">Buscar</p>
                                    <input type="text" class="form-control" name="search">
                                </div>
                            </form>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> Created by <a href="http://mathiasdiaz.uy">Mathias Díaz.uy</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>
    <!--   Core JS Files   -->
    <script src="{{asset('assets/js/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <!--  Charts Plugin -->
    <script src="{{asset('assets/js/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/bootstrap-notify.js')}}"></script>
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="{{asset('assets/js/light-bootstrap-dashboard.js?v=1.4.0')}}"></script>
    <!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets/js/demo.js')}}"></script>

    <script src="{{asset('assets/js/bootstrap.min.js')}}" type="text/javascript"></script>
	
    @yield('scripts')
    
</html>
