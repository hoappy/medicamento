<?php

namespace App\Http\Controllers;

use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(){

        $medicamentos = Medicamento::join('asigna_valors', 'medicamentos.id', '=' , 'asigna_valors.medicamento_id')
        ->join('users', 'users.id', '=' , 'asigna_valors.user_id')
        ->get();

        //return $medicamentos;

        return view('medicamento.index', compact('medicamentos'));

    }
}
