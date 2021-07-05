<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

use App\Http\Controllers\MedicamentoController;
use App\Models\Medicamento;

//Route::get('/', function () { return view('welcome'); });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


Route::get('/', [MedicamentoController::class, 'index'])->name('medicamento.index');