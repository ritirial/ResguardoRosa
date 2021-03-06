<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
	<div class="form-group">
		{!! Form::label('titulo', 'Titulo de la actividad:'); !!}
		{!! Form::text('titulo'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('descripcion', 'Descripcion de la actividad:'); !!}
		{!! Form::text('descripcion'); !!}
	</div>
	<div>
		{!! Form::label('fecha', 'Selecciona a fecha de la actividad') !!}
		{!! Form::date('fecha', Carbon\Carbon::now()); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn primary']); !!}
	</div>
</div>
{!! Form::close() !!}