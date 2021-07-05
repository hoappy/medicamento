@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar Medicamento</h1>
@stop

@section('content')
<div class="card">
        <div class="card-header">
            <h1 class="card-title">Ingrese los Campos Con los datos Requeridos</h1>
        </div>
        <div class="card-body">
            {!! Form::model($medicamento, ['route' => ['admin.medicamentos.update', $medicamento], 'method' => 'put']) !!}

            <div class="form-group">
                    {!! form::label('nombre_medicamento', 'Nombre Medicamento') !!}
                    {!! form::text('nombre_medicamento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el/los Nombre/s del Usuario']) !!}

                    @error('name')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('descripcion_medicamento', 'Descripcion Medicamento') !!}
                    {!! form::text('descripcion_medicamento', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el apellido paterno del Usuario a Agregar']) !!}

                    @error('descripcion_medicamento')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                {!! Form::submit('Editar Medicamento', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

            

        </div>
    </div>
    
@stop
