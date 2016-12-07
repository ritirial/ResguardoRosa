<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pagina de Administradores</title>

    <!-- Custom CSS -->
    <link href="{{URL::asset('assetsSidebar/css/simple-sidebar.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/font-awesome/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assetsSidebar/css/zabuto_calendar.css') }}">
    <link href="{{URL::asset('assetsSidebar/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper" style="background-color:#f44687;">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a style="color:white;">@yield('title')</a>
                </li>
                <li>
                    <a href="{{ route('actividades.index') }}" style="color:white; border-bottom:1px solid white; border-top:2px solid white;">ACTIVIDADES</a>
                </li>
                <li>
                    <a href="{{ route('fotosactividades.index') }}" style="color:white; border-bottom:1px solid white;">FOTOS DE ACTIVIDADES</a>
                </li>
                <li>
                    <a href="{{ route('integrantes.index') }}" style="color:white; border-bottom:1px solid white;">INTEGRANTES</a>
                </li>
                <li>
                    <a href="{{ route('donantes.index') }}" style="color:white;">DONANTES</a>
                </li>
                <li>
                    <a class="logout" href="{{route('logout')}}" style="color:white; border-bottom:2px solid white; border-top:2px solid white;"><strong>CERRAR SESION</strong></a>
                </li>
            </ul>
        </div>

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{URL::asset('assetsSidebar/js/jquery.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{URL::asset('assetsSidebar/js/bootstrap.min.js')}}"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
