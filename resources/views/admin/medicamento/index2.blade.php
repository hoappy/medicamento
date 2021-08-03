@extends('adminlte::page')

@section('title', 'Listado Usuarios Aceptados')

@section('content_header')
        <a class="btn btn-secondary float-right" href="{{route('admin.medicamentos.create')}}">Agregar Medicamento</a>
    <h1>Listado Medicamentos</h1>
@stop

@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('admin.medicamentos-index2')
@stop
