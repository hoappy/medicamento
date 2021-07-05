
<div>
    <div class="card">
        <div class="card-header">
            <input wire:model="search" type="text" class="form-control" placeholder="Ingrese Nombre del medicamento y/o Nombre de La farmacia">
        </div>
        @if($medicamentos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead class="text-center">
                    <tr>
                        <th scope="col">Farmacia</th>
                        <th scope="col">Medicamento</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Valor</th>  
                    </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($medicamentos as $medicamento)      
                            <tr>
                                <td>{{$medicamento->name}}</td>
                                <td>{{$medicamento->nombre_medicamento}}</td>
                                <td>{{$medicamento->descripcion_medicamento}}</td>
                                <td>{{$medicamento->cantidad}}</td>
                                <td>{{$medicamento->valor}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body">
                <strong>No hay registros</strong>
            </div>
        @endif
        <div class="card-footer">
            {{$medicamentos->links()}}
        </div>
    </div>
</div>
