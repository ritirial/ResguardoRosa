
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

            @foreach($actividades as $actividad)
            <div class="post-preview">
                <div class="thumbnail">
                    <div class="caption">
                        <a href="{{ route('rr.show', [ $actividad->id]) }}">
                            <h2 class="post-title">
                                {{$actividad->titulo}}
                            </h2>
                        </a>
                        <h3 class="post-subtitle">
                            {{$actividad->descripcion}}
                        </h3>
                        <p class="post-meta">{{$actividad->fecha->diffForHumans()}}</p>
                    </div>
                    <img src="{{Storage::url(App\FotoActividad::where('actividad', $actividad->id)->first()["ruta"])}}">
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
