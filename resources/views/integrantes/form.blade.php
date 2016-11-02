<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
	<div class="form-group">
		{!! Form::label('nombre', 'Escriba el nombre del nuevo integrante:'); !!}
		{!! Form::text('nombre'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('descripcion', 'Escriba la descripcion del integrante'); !!}
		{!! Form::text('descripcion'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('foto', 'Selecciona una foto para su integrante:'); !!}
		{!! Form::file('image') !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn primary']); !!}
		{!! Form::close() !!}
	</div>
</div>
{!! Form::close() !!}