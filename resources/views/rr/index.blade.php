
@extends('layouts.paginaweb')

@section('content')
<!-- Page Header -->
<!-- Set your background image for this header on the line below. -->
<header class="intro-header" style="background: #a3ddf0">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="site-heading">
                    <h1>Resguardo Rosa</h1>
                    <hr class="small">
                    <span class="subheading">Asociación Civil de Asistencia a la Mujer</span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1" id="recentsPreview">
            <!-- Radio -->
            <h2 class="section-heading">Programa de Radio</h2>
            <iframe src="https://mixlr.com/users/5775046/embed?autoplay=true" width="100%" height="180px" scrolling="no" frameborder="no" marginheight="0" marginwidth="0"></iframe><small><a href="http://mixlr.com/resguardo-rosa-ac" style="color:#1a1a1a;text-align:left; font-family:Helvetica, sans-serif; font-size:11px;">Resguardo Rosa A.C. está en Mixlr</a></small>
            
            <hr>
            <h2 class="section-heading">Publicaciones</h2>
            @foreach($actividades as $actividad)
            <div class="post-preview">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="{{ route('rr.show', [ $actividad->id]) }}">
                            <h2 class="post-title" align="left">
                                {{$actividad->titulo}}
                            </h2>
                        </a>
                        <h3 class="post-subtitle" align="justify">
                            {{str_limit($actividad->descripcion, 100)}}
                        </h3>
                        <p class="post-meta">{{$actividad->fecha->diffForHumans()}}</p>
                    </div>
                    <img src="{{Storage::url(App\FotoActividad::where('actividad', $actividad->id)->first()["ruta"])}}" class="img-responsive img-rounded" width="60%">
                </div>
            </div>
            @endforeach
            
            <hr>
            <!-- Pager
            <ul class="pager">
                <li class="next">
                    <a href="#">Anteriores &rarr;</a>
                </li>
            </ul> -->
        </div>
    </div>
</div>

<hr>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <p class="copyright text-muted"><small>Derechos Reservados&copy; Fudación Resguardo Rosa 2016</small></p>
            </div>
        </div>
    </div>
</footer>
@endsection
