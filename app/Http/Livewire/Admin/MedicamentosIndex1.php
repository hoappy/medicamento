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
        $medicamentos = Medicamento::where('nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        ->Where('estado', '=', '0')
        ->paginate(10);

        return view('livewire.admin.medicamentos-index1', compact('medicamentos'));
    }
}
