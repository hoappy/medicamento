<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicamento;
use Livewire\Component;

use Livewire\WithPagination;

class MedicamentosIndex3 extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $medicamentos = Medicamento::
        join('cargas', 'medicamentos.id', '=' , 'cargas.medicamento_id')
        ->join('users', 'users.id', '=' , 'cargas.user_id')
        ->Where('medicamentos.estadoo', '=', '0')
        
        ->where('medicamentos.nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        
        ->select('medicamentos.id as id', 'medicamentos.nombre_medicamento as nombre_medicamento',
            'medicamentos.descripcion_medicamento as descripcion_medicamento', 'users.name as name', 'cargas.fecha_carga as fecha_carga')

        ->paginate(10);

        return view('livewire.admin.medicamentos-index3', compact('medicamentos'));
    }
}
