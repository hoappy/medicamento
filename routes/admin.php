<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;

Route::get('', [HomeController::class, 'index'])->name('admin.home');

//restringir ruta mediante middkeware Route::resource('users', UserController::class)->middleware('can:admin.user.index')->names('admin.users');
//generacion rutas del curd excepto show Route::resource('users', UserController::class)->except('show')->names('admin.users');

Route::resource('users', UserController::class)->names('admin.users');

Route::get('users/pendientes/index', [UserController::class, 'index1'])->name('admin.users.index1');
Route::get('users/rechazados/index', [UserController::class, 'index2'])->name('admin.users.index2');

Route::get('users/{id}/aceptar', [UserController::class, 'aceptar'])->name('admin.users.aceptar');
Route::get('users/{id}/rechazar', [UserController::class, 'rechazar'])->name('admin.users.rechazar');

Route::get('users/{user}/roleasig', [UserController::class, 'roleasig'])->name('admin.users.roleasig');
Route::put('users/{user}/rolestore', [UserController::class, 'rolestore'])->name('admin.users.rolestore');


