<div class="form-panel">
	<h4 class="mb"><i class="fa fa-angle-right"></i> Inserta la informaci&oacute;n</h4>
		<div class="form-group">
		    {!! Form::label('titulo', 'Titulo:'); !!}
		    {!!  Form::text('titulo'); !!}
		</div>
		<div class="form-group">
		   {!! Form::label('descripcion', 'Descripcion:'); !!}
		    {!!  Form::text('descripcion'); !!}
		</div>
		<div class="form-group">
		    {!! Form::submit($submit_text, ['class'=>'btn primary']) !!}
		</div>
</div>
{!! Form::close() !!}
