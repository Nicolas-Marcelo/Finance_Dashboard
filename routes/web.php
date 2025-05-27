<?php

use App\Http\Controllers\ContaController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/usuarios/create', [UsuarioController::class, 'create'])->name('usuarios.create');
Route::post('/usuarios/store', [UsuarioController::class, 'store'])->name('usuarios.store');

Route::get('/usuarios/login', [UsuarioController::class, 'formularioLogin'])->name('usuarios.formlogin');
Route::post('/usuarios/login', [UsuarioController::class, 'login'])->name('usuarios.login');
Route::post('/usuarios/logout', [UsuarioController::class, 'logout'])->name('usuarios.logout');

Route::get('/usuarios/perfil', [UsuarioController::class, 'perfil'])->name('usuarios.perfil');





Route::get('/contas', [ContaController::class, 'index'])->name('contas.index');

// Formulário de criação
Route::get('/contas/create', [ContaController::class, 'create'])->name('contas.create');

// Armazenar nova conta
Route::post('/contas', [ContaController::class, 'store'])->name('contas.store');