@extends('layouts.sidebar')

@section('title', 'Actividades')

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
@if (session('message'))
    <div class = "alert alert-success" class = "close">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif

<div class="col-lg-12">
	<h2>Actividades</h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar la informaci&oacute;n, y eliminar a las actividades de la base de datos</p>
	<div class="content-panel">
		<h4><i class="fa fa-angle-right"></i> Actividades</h4>
		<section id="no-more-tables">
			<table class="table table-bordered table-striped table-condensed cf">
				<thead class="cf">
					<tr>
						<th>ID</th>
						<th>T&iacute;tulo</th>
						<th>Descripci&oacute;n</th>
						<!-- <th>Secci&oacute;n</th> -->
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($actividades as $actividad)
					<tr>
						<td data-title="ID"> {{ $actividad->id }} </td>
						<td data-title="Titulo"> <a href="{{ route('actividades.show', [ $actividad->id]) }}">{{ $actividad->titulo }} </td>
						<td data-title="Descripcion"> {{ $actividad->descripcion }} </td>
						<!-- <td data-title="Seccion"> {{ App\Seccion::find($actividad->seccion)->titulo}} </td> -->
						<td data-title="Accion">
							<div class="col-xs-2 col-xs-offset-3">
								{!! Form::open( [ 'method' => 'GET', 'route'=>['actividades.edit', $actividad->id]]) !!}
								<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
								{!! Form::close() !!}
							</div>
							<div class="col-xs-2">
								{!! Form::open( [ 'method' => 'DELETE', 'route'=>['actividades.destroy', $actividad->id]]) !!}
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
		{!! Form::open( [ 'method' => 'GET', 'route' =>['actividades.create']]) !!}
		{!! Form::submit('Crear actividad', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection