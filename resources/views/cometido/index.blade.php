@extends('adminlte::page')

@section('title', 'Listado Cometidos')

@section('content_header')
    <h1>Listado de Cometidos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.cometidos.create')}}">Agregar Cometido</a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead class="text-center">
                <tr>
                    <th scope="col">Nombres</th>
                    
                    
                    <!--<th scope="col">Detalles</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>-->
                    
                </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($cometidos as $cometido)      
                <tr>
                    <td>{{$cometido->name}}</td>
                    

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.cometidos.show', $cometido)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.cometidos.edit', $cometido)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form href="{{route('admin.cometidos.destroy', $cometido)}}" method="POST">
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
