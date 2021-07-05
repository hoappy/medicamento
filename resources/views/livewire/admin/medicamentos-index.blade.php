<div>
    <div class="card">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese Rut/Nombres/Apellidos/Correo de un Usuario">
            </div>
            @if($medicamentos->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            
                            <th scope="col">Nombre Medicamento</th>
                            <th scope="col">Descripcion Medicamento</th>
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($medicamentos as $medicamento)      
                        <tr>
                            <td>{{$medicamento->nombre_medicamento}}</td>
                            <td>{{$medicamento->descripcion_medicamento}}</td>
                            
                            <td width="10px">
                                <a class="btn btn-success btn-sm" href="{{route('admin.medicamentos.edit', $medicamento)}}">Editar</a>
                            </td>
                        
                            <td >
                                <form action="{{route('admin.medicamentos.eliminar', $medicamento)}}" method="POST">
                                    @csrf
                                    {{method_field('put')}}
                                    <button type="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$medicamentos->links()}}
                </div>
            @else
                <div class="card-body">
                    <strong>No hay registros</strong>
                </div>
            @endif
        </div>
    </div>
</div>

