<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\MedicamentoController;
use App\Http\Controllers\Api\UserController;

Route::resource('users', UserController::class)->names('api.users');

Route::resource('medicamentos', MedicamentoController::class)->names('api.medicamentos');

Route::put('medicamentos/{id}/restaurar', [MedicamentoController::class, 'restaurar'])->name('api.medicamentos.restaurar');
Route::put('medicamentos/{id}/eliminar', [MedicamentoController::class, 'eliminar'])->name('api.medicamentos.eliminar');





