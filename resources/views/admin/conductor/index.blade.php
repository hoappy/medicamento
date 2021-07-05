@extends('adminlte::page')

@section('title', 'Listado de Conductor')

@section('content_header')
    <h1>Listado de Conductor</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.conductors.create')}}">Agregar Conductor</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido Paterno</th>
                    <th scope="col">Apellido Materno</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Tipo de Licencia</th>
                    <th scope="col">Años de experiencia</th>
                    
                    
                    <th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                    
                </tr>
                </thead>
                 <tbody class="text-center">
                    @foreach ($conductors as $conductor)      
                <tr>
                    <td>{{$conductor->nombre_conductor}}</td>
                    <td>{{$conductor->apellido_p_conductor}}</td>
                    <td>{{$conductor->apellido_m_conductor}}</td>
                    <td>{{$conductor->telefono_conductor}}</td>
                    <td>{{$conductor->tipo_licencia}}</td>
                    <td>{{$conductor->annos_experiencia}}</td>





                    

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.conductors.show', $conductor)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.conductors.edit', $conductor)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form href="{{route('admin.conductors.destroy', $conductor)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                 
                
                </tbody>
            </table>
        </div>
    </div>
    
@stop
