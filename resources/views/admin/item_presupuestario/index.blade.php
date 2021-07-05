@extends('adminlte::page')

@section('title', 'Listado Usuarios')

@section('content_header')
    <h1>Listado Usuarios</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary btn-sm" href="{{route('admin.item_presupuestariors.create')}}">Agregar Usuario</a>
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
                <!-- <tbody class="text-center">
                    @foreach ($item_presupuestariors as $item_presupuestarior)      
                <tr>
                    <td>{{$item_presupuestarior->name}}</td>
                    

                    <td width="10px"> 
                        <a class="btn btn-primary btn-sm" href="{{route('admin.item_presupuestariors.show', $item_presupuestarior)}}">Detalles</a>
                    </td>
                    <td width="10px">
                        <a class="btn btn-success btn-sm" href="{{route('admin.item_presupuestariors.edit', $item_presupuestarior)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form href="{{route('admin.item_presupuestariors.destroy', $item_presupuestarior)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                        </form>
                    </td>
                    
                </tr>
                @endforeach
                
                
                </tbody> -->
            </table>
        </div>
    </div>
    
@stop
