@extends('layouts.sidebar')

@section('title', 'Donantes')

@section('content')

<h2> Editar donante </h2>
<p> Aqu&iacute; podr&aacute;s editar cada donante. <br> </p>

<div class="col-sm-12"> 
{!! Form::model($donante,
    [
    'method' => 'PUT',
    'route' =>['donantes.update', $donante->id], 
    'files' => 'true' 
    ]) !!}
@include('donantes.form', ['submit_text' => 'Editar'])
</div>
@endsection