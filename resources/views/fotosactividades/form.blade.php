<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
	<div class="form-group">
		{!! Form::label('ruta', 'Selecciona tu archivo:'); !!}
		{!! Form::file('image') !!}
	</div>
	<div class="form-group">
		{!! Form::label('actividad', 'Seleccione uno'); !!}
		{!! Form::select('actividad', $fotosactividades); !!}
	</div>
	<div class="form-group">
		{!! Form::submit($submit_text, ['class'=>'btn primary']); !!}
	</div>
</div>
{!! Form::close() !!}