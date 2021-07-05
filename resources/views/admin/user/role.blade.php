@extends('adminlte::page')

@section('title', 'Detalles Usuario')

@section('content_header')
    <h1>Rol del Usuario</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Asignar un rol al usuario</h1>
        </div>
        <div class="card-body">
            <p class="h5">Nombre:</p>
            <p class="form-control">{{$user->name}} {{$user->apellido_P}} {{$user->apellido_M}} </p>
            <p class="h5">Rut:</p>
            <p class="form-control">{{$user->rut}}</p>
            
            <h2 class="h5">Listado de Roles</h2>
            {!! Form::model($user, ['route' => ['admin.users.rolestore', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <lebel>
                            {!! form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </lebel>
                    </div>
                @endforeach

                {!! Form::submit('Asignar Rol', ['class' => 'btn btn-primary mt-2'])!!}
            {!! Form::close() !!}
        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop