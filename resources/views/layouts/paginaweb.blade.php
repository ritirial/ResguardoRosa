<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Resguardo Rosa</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{URL::asset('Assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="{{URL::asset('Assets/css/clean-blog.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('Assets/css/style.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{URL::asset('Assets/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,400i,600,600i' rel='stylesheet' type='text/css'>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-custom navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Cambiar navegación</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{route('/')}}"><img src="Assets/img/RELOGO.png" style="height: 48px; padding-left: 0px;"></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{route('donaciones.index')}}">Donadores</a>
                    </li>
                    <li>
                        <a href="{{route('gallery.index')}}">Galería</a>
                    </li>
                    <li>
                        <a href="{{route('about.index')}}">Nosotros</a>
                    </li>
                    <li>
                        <a href="{{route('/admin')}}">INGRESAR</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    @yield('content')

    <!-- jQuery -->
    <script src="{{URL::asset('Assets/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('Assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Contact Form JavaScript -->
    <script src="{{URL::asset('Assets/js/jqBootstrapValidation.js')}}"></script>
    <script src="{{URL::asset('Assets/js/contact_me.js')}}"></script>

    <!-- Theme JavaScript -->
    <script src="{{URL::asset('Assets/js/clean-blog.min.js')}}"></script>

</body>

</html>
