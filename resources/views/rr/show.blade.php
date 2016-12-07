@extends('layouts.paginaweb')

@section('content')
<header class="intro-header" style="background: #a3ddf0">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
				<div class="site-heading">
					<h1>{{$actividad->titulo}}</h1>
					<hr class="small">
				</div>
			</div>
		</div>
	</div>
</header>
<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            <h2>Descripción</h2>
            <p align="justify">{{$actividad->descripcion}}</p>
            <hr>
            <h2>Fotos del evento</h2>
            @foreach($imagenes as $imagen)
            <div class="col-xs-6 col-md-6">
                <div class="thumbnail">
                    <img src="{{Storage::url($imagen->ruta)}}">
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
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
