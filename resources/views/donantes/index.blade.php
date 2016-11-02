@extends('layouts.sidebar')

@section('title', 'Donantes')

@section('content')

<div class="col-lg-12">
	<h2>Donantes</h2>
	<p> En esta secci&oacute;n podr&aacute;s agregar, modificar la informaci&oacute;n, y eliminar los donantes que estén en la base de datos</p>
	<div class="content-panel">
		<h4><i class="fa fa-angle-right"></i> Donantes</h4>
		<section id="no-more-tables">
			<table class="table table-bordered table-striped table-condensed cf">
				<thead class="cf">
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Descripci&oacute;n</th>
						<th>Logo</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($donantes as $donante)
					<tr>
						<td data-title="ID"> {{ $donante->id }}</td>
						<td data-title="Nombre"><a href="{{ route('donantes.show', [ $donante->id]) }}"> {{ $donante->nombre }} </td>
						<td data-title="Descripcion"> {{ $donante->descripcion }} </td>
						<td dtaa-title="Foto"><img src="{{Storage::url($donante->logo)}}" width=80 height=80 class="img-responsive col-xs-offset-3 img-thumbnail"></td>
						<td data-title="Accion">
							<div class="col-xs-2 col-xs-offset-3">
								{!! Form::open( [ 'method' => 'GET', 'route'=>['donantes.edit', $donante->id]]) !!}
								<button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
								{!! Form::close() !!}
							</div>
							<div class="col-xs-2">
								{!! Form::open( [ 'method' => 'DELETE', 'route'=>['donantes.destroy', $donante->id]]) !!}
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
		{!! Form::open( [ 'method' => 'GET', 'route' =>['donantes.create']]) !!}
		{!! Form::submit('Crear donante', ['class' => 'btn btn-success']) !!}
		{!! Form::close() !!}
	</div>
</div>

@endsection