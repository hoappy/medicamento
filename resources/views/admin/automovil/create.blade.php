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
            {!! Form::open(['route' => 'admin.automovils.store']) !!}

                <div class="form-group">
                    {!! form::label('modelo', 'Modelo') !!}
                    {!! form::text('modelo', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el modelo del vehiculo']) !!}

                    @error('modelo')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('patente', 'Patente') !!}
                    {!! form::text('patente', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la patente del vehiculo']) !!}

                    @error('patente')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('anno', 'Año') !!}
                    {!! form::number('anno', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el ano del vehiculo']) !!}

                    @error('anno')
                        <span class="text-danger">{{$message}}</span>
                    @enderror

                </div>
                <div class="form-group">
                    {!! form::label('tipo_automovil', 'Tipo automovil') !!}
                    {!! form::text('tipo_automovil', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el tipo de vechiculo']) !!}
                    
                    @error('tipo_automovil')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>
                <div class="form-group">
                    {!! form::label('marca_automovil', 'Marca automovil') !!}
                    {!! form::text('marca_automovil', null, ['class' => 'form-control', 'placeholder' => 'Ingrese la marca del automovil']) !!}
                    
                    @error('marca_automovil')
                        <span class="text-danger">{{$message}}</span>
                    @enderror
                    
                </div>

                {!! Form::submit('Agregar Automovil', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>
    </div>
    
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
@endsection