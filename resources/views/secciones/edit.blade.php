@extends('layouts.sidebar')

@section('title', 'Secciones')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

<h2> Editar seccion </h2>
<p> Aqu&iacute; podr&aacute;s editar una secci&oacute;n. <br> </p>

<div class="col-sm-12"> 
{!! Form::model($seccion,
    [
    'method' => 'PUT',
    'route' =>['secciones.update', $seccion->id],  
    ]) !!}
@include('secciones.form', ['submit_text' => 'Editar'])
</div>
@endsection