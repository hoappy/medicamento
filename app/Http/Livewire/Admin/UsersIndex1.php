<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

use Livewire\WithPagination;

class UsersIndex1 extends Component
{
    use WithPagination;

    public $search;

    protected $paginationTheme = 'bootstrap';
    
    public function updatingSearch(){
        $this->resetPage();
    }

    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
        ->Where('estado', '=', '0')
        ->paginate(10);

        return view('livewire.admin.users-index1', compact('users'));
    }
}