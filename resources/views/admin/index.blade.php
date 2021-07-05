@extends('adminlte::page')

@section('title', 'Home')

@section('content_header')
    <h1>Portal Administrador</h1>
@stop


@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Bienvenido</h1>
        </div>
        <div class="card-body">
            <p>Este es el panel de administracion donde podra gestionar todos los ambitos del sistema de Busqueda de Medicamentos</p>
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop