@extends('layouts.sidebar')

@section('title', 'Avisos')

@section('content')

@if (session('error'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('error') }}
    </div>
@endif

<h2> Editar aviso </h2>
<p> Aqu&iacute; podr&aacute;s editar el aviso. <br> </p>

<div class="col-sm-12"> 
{!! Form::model($aviso,
    [
    'method' => 'PUT',
    'route' =>['avisos.update', $aviso->id], 
    'files' => 'true' 
    ]) !!}
@include('avisos.form', ['submit_text' => 'Editar'])
</div>
@endsection