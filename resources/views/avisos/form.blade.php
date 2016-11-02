<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
	<div class="form-group">
		{!! Form::label('titulo', 'Escribe el titulo:'); !!}
		{!! Form::text('titulo'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('descripcion', 'Escriba la descripcion del aviso'); !!}
		{!! Form::text('descripcion'); !!}
	</div>
	<div class="form-group">
		{!! Form::label('foto', 'Selecciona una imagen para tu aviso:'); !!}
		{!! Form::file('image') !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn primary']); !!}
	</div>
</div>
{!! Form::close() !!}