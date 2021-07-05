@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Usuario</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! form::label('name', 'Nombres') !!}
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el/los Nombre/s del Usuario']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('telefono', 'Telefono') !!}
                    {!! form::number('telefono', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del Usuario a Agregar']) !!}

                    @error('telefono')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('coordenadas', 'Coordenadas') !!}
                    {!! form::text('coordenadas', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno del Usuario a Agregar']) !!}

                    @error('coordenadas')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('email', 'Correo Electronico') !!}
                    {!! form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el correo electronivo del Usuario a Agregar']) !!}

                    @error('apellido_m')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('direccion', 'Direccion') !!}
                    {!! form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion del Usuario a Agregar']) !!}

                    @error('direccion')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Agregar Usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

            

        </div>
    </div>
    
@stop
