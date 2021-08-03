<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicamento;
use Livewire\Component;

use Livewire\WithPagination;

class MedicamentosIndex2 extends Component
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

        $medicamentos = Medicamento::Where('medicamentos.estado', '=', '0')
        ->where('medicamentos.nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        
        ->paginate(10);

        return view('livewire.admin.medicamentos-index2', compact('medicamentos'));
    }
}
