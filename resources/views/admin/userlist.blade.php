<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Usuarios') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- contenido aqui --}}

                <!-- tabla de usuarios -->
<div class="card-body container">
    <div class="card tex-center">
      <div class="card-header text-center">

      </div>
      
        <div class="table-responsive">
          <table class="table">
            <thead class="text-center">
              <tr>
                
               
                <th scope="col">Nombres</th>
                <th scope="col">Apellido Paterno</th>
                <th scope="col">Apellido Materno</th>
                <th scope="col">Email</th>
                <th scope="col">Direccion</th>
                <th scope="col">Grado</th>
                <th scope="col">Cargo</th>
                <th scope="col">Eliminar</th>
                <th scope="col">Editar</th>
                <th scope="col">Detalles</th>
                
              </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($usuarios as $usuario)
                    
                
              <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->apellido_p}}</td>
                <td>{{$usuario->apellido_M}}</td>
                <td>{{$usuario->email}}</td>
                <td>{{$usuario->direccion}}</td>
                <td>{{$usuario->grado}}</td>
                <td>{{$usuario->nombre_cargo}}</td>

                <a class="btn btn-danger" href="#" role="button">Eliminar</a>
                </td>
                <td>
                <a class="btn btn-success" href="#" role="button">Editar</a>
                </td>
                <td>
                <a class="btn btn-primary" href="#" role="button">Detalles</a>
                </td>
              </tr>
              @endforeach
              
              
            </tbody>
          </table>
        
      </div>

    </div>
    
    
    
  </div>
            


            </div>
        </div>
    </div>
</x-app-layout>