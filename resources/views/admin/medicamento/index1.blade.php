@extends('adminlte::page')

@section('title', 'Listado Usuarios Aceptados')

@section('content_header')
        
    <h1>Listado Medicamentos</h1>
@stop

@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('admin.medicamentos-index1')
@stop
