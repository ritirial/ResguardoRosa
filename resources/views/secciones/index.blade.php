@extends('layouts.sidebar')

@section('title', 'Secciones')

@section('content')

@if (session('deleted'))
    <div class="alert alert-warning">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('deleted') }}
    </div>
@endif
@if (session('failDeleted'))
    <div class="alert alert-danger">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('failDeleted') }}
    </div>
@endif
@if (session('message'))
    <div class = "alert alert-success" class = "close">
        <a class="close" data-dismiss="alert" aria-label="close">&times;</a>
        {{ session('message') }}
    </div>
@endif

<div class="col-lg-12">
    <h2>Secciones</h2>
    <section id="no-more-tables">
              <table class="table table-bordered table-striped table-condensed cf">
                <thead class="cf">
                  <tr>
                      <th>ID</th>
                      <th>Titulo</th>
                      <th>Descripcion</th>
                      <th>Accion</th>
                  </tr>
                </thead>
                  <tbody>
                     @foreach($secciones as $seccion)
                        <tr>
                            <td data-title="ID">{{$seccion->id}}</td>
                            <td data-title="Titulo"><a href="{{ route('secciones.show', [ $seccion->id]) }}">{{$seccion->titulo}}</td>
                            <td data-title="Descripcion">{{$seccion->descripcion}}</td>
                            <td data-title="Acciones">
                                <div class="col-xs-2 col-xs-offset-3">
                                {!! Form::open( [ 'method' => 'GET', 'route'=>['secciones.edit', $seccion->id]]) !!}
                                <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                {!! Form::close() !!}
                                </div>
                                <div class="col-xs-2">
                                {!! Form::open( [ 'method' => 'DELETE', 'route'=>['secciones.destroy', $seccion->id]]) !!}
                                <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                {!! Form::close() !!}
                                </div>
                            </td>
                        </tr>
                     @endforeach   
                  </tbody>
              </table>
        </section>
        <div>
            {!! Form::open( [ 'method' => 'GET', 'route' =>['secciones.create']]) !!}
            {!! Form::submit('Agregar una nueva seccion', ['class' => 'btn btn-success']) !!}
            {!! Form::close() !!}
        </div>
</div>

@endsection