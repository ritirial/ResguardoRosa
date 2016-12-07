@extends('layouts.sidebar')

@section('title', 'Actividades')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

<h2> Editar la actividad </h2>
<hr>
<p> Aqu&iacute; podr&aacute;s editar la actividad. <br> </p>

<div class="col-sm-12"> 
{!! Form::model($actividad,
    [
    'method' => 'PUT',
    'route' =>['actividades.update', $actividad->id], 
    'files' => 'true' 
    ]) !!}
@include('actividades.form', ['submit_text' => 'Editar'])
</div>
@endsection