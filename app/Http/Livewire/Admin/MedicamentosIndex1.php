<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicamento;
use Livewire\Component;

use Livewire\WithPagination;

class MedicamentosIndex1 extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $user = auth()->user();

        $medicamentos = Medicamento::crossJoin('asigna_valors', 'medicamentos.id', '=' , 'asigna_valors.medicamento_id')
        ->crossJoin('users', 'users.id', '=' , 'asigna_valors.user_id')
        //->Where('medicamentos.estado', '=', '0')

        ->where('medicamentos.nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        ->where('users.id', '=', $user->id)
        
        ->select('medicamentos.id as id', 'medicamentos.nombre_medicamento as nombre_medicamento',
                'medicamentos.descripcion_medicamento as descripcion_medicamento', 'asigna_valors.valor as valor', 
                'asigna_valors.fecha_asigna as fecha_asigna', 'asigna_valors.cantidad as cantidad', 'medicamentos.estado as estado')
        ->paginate(10);

        return view('livewire.admin.medicamentos-index1', compact('medicamentos'));
    }
}
