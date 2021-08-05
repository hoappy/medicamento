<div>
    <div class="card">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/foto0.png" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/foto1.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/foto2.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
            </a>
        </div>
    </div>
    <div class="card">
        
        <div class="card-header">
            <h4><strong> Filtro de búsqueda</strong></h4>
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
                        <th scope="col">Direccion Farmacia</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($medicamentos as $medicamento)
                        @if ($medicamento->estadoo === '1')
                        <tr>
                            <td>{{$medicamento->name}}</td>
                            <td>{{$medicamento->nombre_medicamento}}</td>
                            <td>{{$medicamento->descripcion_medicamento}}</td>
                            <td>{{$medicamento->cantidad}}</td>
                            <td>{{$medicamento->valor}}</td>
                            <td>{{$medicamento->direccion}}</td>
                        </tr>
                        @endif
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</div>