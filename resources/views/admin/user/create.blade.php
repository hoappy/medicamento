@extends('adminlte::page')

@section('title', 'Agregar Usuario')

@section('content_header')
    <h1>Agregar Usuario</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::open(['route' => 'admin.users.store']) !!}

            <div class="form-group">
                    {!! form::label('rut', 'Rut') !!}
                    {!! form::text('rut', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el Rut del Usuario a Agregar']) !!}

                    @error('rut')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('name', 'Nombres') !!}
                    {!! form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el/los Nombre/s del Usuario a Agregar']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('apellido_P', 'Apellido Paterno') !!}
                    {!! form::text('apellido_P', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del Usuario a Agregar']) !!}

                    @error('apellido_P')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                <div class="form-group">
                    {!! form::label('apellido_M', 'Apellido Materno') !!}
                    {!! form::text('apellido_M', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido materno del Usuario a Agregar']) !!}

                    @error('apellido_M')
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
                    {!! form::label('password', 'Contrasenna') !!}
                    {!! form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la contrasenna']) !!}

                    @error('password')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('password_confirmation', 'Contrasenna') !!}
                    {!! form::text('password_confirmation', null, ['class' => 'form-control', 'placeholder' => 'Re-Ingrese la contrasenna']) !!}

                    @error('password_confirmation')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </di>

                <div class="form-group">
                    {!! form::label('dependencia_id', 'Dependencia') !!}
                    {!! form::select('dependencia_id', $dependencias, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Dependencia']) !!}

                    @error('dependencia_id')
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

                <div class="form-group">
                    {!! form::label('fecha_nacimiento', 'Fecha de Nacimiento') !!}
                    {!! form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la Fecha de Nacimiento del Usuario a Agregar']) !!}

                    @error('fecha_nacimiento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('grado', 'Grado') !!}
                    {!! form::text('grado', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el grado del Usuario a Agregar']) !!}

                    @error('grado')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                <div class="form-group">
                    {!! form::label('nombre_cargo', 'Cargo') !!}
                    {!! form::text('nombre_cargo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del cargo del Usuario a Agregar']) !!}

                    @error('nombre_cargo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Agregar Usuario', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

            

        </div>
    </div>
    
@stop

