@extends('adminlte::page')

@section('title', 'Listado Usuarios Aceptados')

@section('content_header')
    @can('admin.user.index')
        <a class="btn btn-secondary float-right" href="{{route('admin.users.create')}}">Agregar Usuario</a>
    @endcan
    <h1>Listado Usuarios Aprobados</h1>
@stop

@section('content')
    @livewireStyles
    @livewireScripts
    @livewire('admin.users-index')
@stop
