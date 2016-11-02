@extends('layouts.sidebar')

@section('title', 'Actividad')

@section('content')

<h1 class="text-center">{{$actividad->titulo}}</h1>
<p class="text-left">{{$actividad->descripcion}}</p>
<!-- <p class="text-left"><strong>Secci&oacute;n:</strong> {{ App\Seccion::find($actividad->seccion)->titulo}}</p> -->
<br>
<div class="col-xs-12">
	
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['actividades.index'], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Volver', ['class' => 'btn btn-info btn-block']) !!}
		{!! Form::close() !!}
	</div><div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'GET',
   		 'route' =>['actividades.edit', $actividad->id], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Editar', ['class' => 'btn btn-warning btn-block']) !!}
		{!! Form::close() !!}
	</div>
	<div class="col-xs-4">
		{!! Form::open(
		[
   		 'method' => 'DELETE',
   		 'route' =>['actividades.destroy', $actividad->id], 
   		 'files' => 'true' 
   		 ])  !!}
		{!! Form::submit('Borrar', ['class' => 'btn btn-danger btn-block']) !!}
		{!! Form::close() !!}
	</div>

</div>
@endsection
