<div>
    <div class="card">
            <div class="card-header">
                <input wire:model="search" type="text" class="form-control" placeholder="Ingrese Rut/Nombres/Apellidos/Correo de un Usuario">
            </div>
            @if($users->count())
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="text-center">
                        <tr>
                            
                            <th scope="col">Nombres</th>
                            
                            <th scope="col">Email</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Coordenadas</th>

                            <th scope="col">Fecha Solicitud</th>
                            <th scope="col">Fecha Rechazo</th>
                            
                            <!--<th scope="col">Detalles</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Eliminar</th>-->
                            
                        </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)      
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->direccion}}</td>
                            <td>{{$user->telefono}}</td>
                            <td>{{$user->coordenadas}}</td>
                            <td>{{$user->fecha_ingreso}}</td>
                            <td>{{$user->fecha_activacion}}</td>
                            

                            @can('admin.user.index')
                                
                                    <td>
                                        <a class="btn btn-success btn-sm" href="{{route('admin.users.roleasig', $user)}}">Asignar Rol</a>
                                    </td>
                                @can('admin.user.roleasig')
                                @endcan
                                
                                    <td width="10px"> 
                                        <a class="btn btn-primary btn-sm" href="{{route('admin.users.show', $user)}}">Detalles</a>
                                    </td>
                                
                                @can('admin.user.edit')
                                    <td width="10px">
                                        <a class="btn btn-success btn-sm" href="{{route('admin.users.edit', $user)}}">Editar</a>
                                    </td>
                                @endcan
                                @can('admin.user.destroy')
                                    <!--<td width="10px">
                                        <form href="{{route('admin.users.destroy', $user)}}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button tupe="submit" class="btn btn-danger btn-sm" >Eliminar</button>
                                        </form>
                                    </td>-->
                                @endcan
                                @can('admin.user.activar')
                                    <!--<td width="10px">
                                        <form href="{{route('admin.users.activar', $user)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button tupe="submit" class="btn btn-danger btn-sm" >Activar</button>
                                        </form>
                                    </td>-->
                                @endcan
                                @can('admin.user.desactivar')
                                    <!--<td >
                                        <form href="{{route('admin.users.desactivar', $user)}}" method="POST">
                                            @csrf
                                            @method('put')
                                            <button tupe="submit" class="btn btn-primary btn-sm" >Desactivar</button>
                                        </form>
                                    </td>-->
                                @endcan
                            @endcan
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{$users->links()}}
                </div>
            @else
                <div class="card-body">
                    <strong>No hay registros</strong>
                </div>
            @endif
        </div>
    </div>
</div>