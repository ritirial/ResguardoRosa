@extends('layouts.sidebar')

@section('title', 'Fotos de Actividades')

@section('content')

@if (session('deleted'))
    <div class="alert alert-warning">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('deleted') }}
    </div>
@endif
@if (session('failDeleted'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('failDeleted') }}
    </div>
@endif

<div class="col-lg-12">
	<h2>Fotos de Actividades</h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar y eliminar las fotos de las actividades de la base de datos</p>
	<div class="content-panel">
		<h4><i class="fa fa-angle-right"></i>Fotos de Actividades</h4>
		<section id="no-more-tables">
			<table class="table table-bordered table-striped table-condensed cf">
				<thead class="cf">
					<tr>
						<th>ID</th>
						<th>Ruta</th>
						<th>Actividad</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($fotosactividades as $actividad)
					<tr>
						<td data-title="ID"> {{ $actividad->id }}</td>
						<td data-title="Ruta"><img src="{{Storage::url($actividad->ruta)}}" width=80 height=80 class="img-responsive col-xs-offset-3 img-thumbnail"></td>
						<td data-title="Actividad"> {{ App\Actividad::find($actividad->actividad)->titulo }} </td>
						<td data-title="Accion">
							<div class="col-xs-2 col-xs-offset-3">
								{!! Form::open( [ 'method' => 'DELETE', 'route'=>['fotosactividades.destroy', $actividad->id]]) !!}
								<button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
								{!! Form::close() !!}
							</div>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table> 
		</section>
	</div><!-- /content-panel -->
	<br>
	<div align="right">
		{!! Form::open( [ 'method' => 'GET', 'route' =>['fotosactividades.create']]) !!}
		{!! Form::submit('Crear actividad', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection