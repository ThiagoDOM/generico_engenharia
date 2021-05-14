<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PropostaController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::any('clientes/search',[ClienteController::class, 'search'])->name('clientes.search');
    Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index')->middleware(['auth']);
    Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('/clientes/{id}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::delete('/clientes/{id}',[ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::get('/clientes/edit/{id}', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{id}',[ClienteController::class, 'update'])->name('clientes.update');


    Route::any('propostas/search',[PropostaController::class, 'search'])->name('propostas.search');
    Route::get('/propostas', [PropostaController::class, 'index'])->name('propostas.index')->middleware(['auth']);
    Route::get('/propostas/create', [PropostaController::class, 'create'])->name('propostas.create');
    Route::post('/propostas', [PropostaController::class, 'store'])->name('propostas.store');
    Route::get('/propostas/{id}', [PropostaController::class, 'show'])->name('propostas.show');
    Route::delete('/propostas/{id}',[PropostaController::class, 'destroy'])->name('propostas.destroy');
    Route::get('/propostas/edit/{id}', [PropostaController::class, 'edit'])->name('propostas.edit');
    Route::put('/propostas/{id}',[PropostaController::class, 'update'])->name('propostas.update');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
