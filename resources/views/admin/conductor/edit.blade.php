@extends('adminlte::page')

@section('title', 'Editar Conductor')

@section('content_header')
    <h1>Editar Conductor</h1>
@stop

@section('content')
     <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body">
            {!! Form::model($conductor, ['route' => ['admin.conductors.update', $conductor], 'method' => 'put']) !!}

                <div class="form-group">
                    {!! form::label('tipo_licencia', 'Tipos de licencia') !!}
                    {!! form::text('tipo_licencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el tipo de licencia']) !!}
                    @error('tipo_licenca')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('annos_experiencia', 'Años de experiencia') !!}
                    {!! form::number('annos_experiencia', null, ['class' => 'form-control', 'placeholder' => 'Ingrese los años de experiencia']) !!}

                    @error('annos_experiencia')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('nombre_conductor', 'Nombre del conductor') !!}
                    {!! form::text('nombre_conductor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese nombre del conductor']) !!}
                    
                    @error('nombre_conductor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('apellido_p_conductor', 'Apellido paterno del conductor') !!}
                    {!! form::text('apellido_p_conductor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido paterno del conductor']) !!}

                    @error('apellido_p_conductor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('apellido_m_conductor', 'Apellido materno del conductor') !!}
                    {!! form::text('apellido_m_conductor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese apellido materno del conductor']) !!}
                    
                    @error('apellido_m_conductor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('telefono_conductor', 'Telefono del conductor') !!}
                    {!! form::text('telefono_conductor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el telefono del conductor']) !!}
                    @error('telefono_conductor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('direccion_conductor', 'Direccion del conductor') !!}
                    {!! form::text('direccion_conductor', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la direccion del conductor']) !!}
                    @error('direccion_conductor')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    {!! form::label('automovil_id', 'Automovil') !!}
                    {!! form::select('automovil_id', $automovil, null, ['class' => 'form-control', 'placeholder' => 'Seleccione Automovil ', 'readonly']) !!}

                    @error('automovil_id')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>

                {!! Form::submit('Modificar Conductor ', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="{{'/vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js'}}"></script>

    <script>
        $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#contrasenna',
            space: '-'
  });
});
    </script>
@stop