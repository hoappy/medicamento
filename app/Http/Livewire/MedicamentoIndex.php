<?php

namespace App\Http\Livewire;

use App\Models\Medicamento;
use Livewire\Component;

use Livewire\WithPagination;

class MedicamentoIndex extends Component
{

    use WithPagination;

    public $search;

    protected $paginationTheme = "bootstrap";

    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $medicamentos = Medicamento::join('asigna_valors', 'medicamentos.id', '=' , 'asigna_valors.medicamento_id')
        ->join('users', 'users.id', '=' , 'asigna_valors.user_id')
        ->where('name', 'LIKE', '%' . $this->search . '%')
        ->orWhere('nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        ->paginate();
        
        return view('livewire.medicamento-index', compact('medicamentos'));
    }

    
}
