@extends('adminlte::page')

@section('title', 'Listado de Dependencias')

@section('content_header')
    <h1>Listado de Dependencias</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.dependencias.create')}}">Agregar Dependencia</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Direccion</th>
                                        
                    <th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    {{-- <th scope="col">Eliminar</th> --}}
                    
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($dependencias as $dependencia)      
                <tr>
                    <td>{{$dependencia->nombre_dependencia}}</td>
                    <td>{{$dependencia->direccion_dependencia}}</td>
                    
                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.dependencias.show', $dependencia)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.dependencias.edit', $dependencia)}}">Editar</a>
                    </td>
                    {{-- <td width="10px">
                        <form href="{{route('admin.dependencias.destroy', $dependencia)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>
                    </td> --}}
                    
                </tr>
                @endforeach
                
                
                </tbody>
            </table>
        </div>
    </div>
    
@stop
