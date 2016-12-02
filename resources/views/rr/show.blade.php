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
<p class="text-center">{{$actividad->descripcion}}</p>
@foreach($imagenes as $imagen)
<div class="col-xs-6 col-md-4">
	<div class="thumbnail">
		<img src="{{Storage::url($imagen->ruta)}}">
	</div>
</div>
@endforeach
<br>
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
