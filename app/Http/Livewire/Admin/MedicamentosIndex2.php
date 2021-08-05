<?php

namespace App\Http\Livewire\Admin;

use App\Models\Medicamento;
use Illuminate\Support\Facades\DB;
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

        $medicamentos = Medicamento::Where('medicamentos.estadoo', '=', '1')
        ->where('medicamentos.nombre_medicamento', 'LIKE', '%' . $this->search . '%')
        ->whereNotIn('id', DB::table('asigna_valors')->select('medicamento_id')->where('user_id', '=', $user->id))
        //->Where('medicamentos.estado', '=', '1')
        
        ->paginate(10);

        return view('livewire.admin.medicamentos-index2', compact('medicamentos'));
    }
}
