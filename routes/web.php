<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SensorController;
use App\Http\Controllers\BombaController;
use App\Http\Controllers\EventoController;

Route::get('/bombas', [BombaController::class, 'index'])->name('bombas.index'); // Mostrar estado de bombas

Route::get('bombas/pdf', [BombaController::class, 'generatePDF'])->name('bombas.pdf'); // Generar PDF

Route::delete('/bombas/{id}', [BombaController::class, 'destroy'])->name('bombas.destroy');
Route::post('/bombas', [BombaController::class, 'store'])->name('bombas.store');
Route::get('bombas/{id}/edit', [BombaController::class, 'edit'])->name('bombas.edit');
Route::put('bombas/{id}', [BombaController::class, 'update'])->name('bombas.update');

// Excluye la ruta "show" de las rutas RESTful de bombas
Route::resource('bombas', BombaController::class)->except(['show']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/bombas/search', [BombaController::class, 'search'])->name('bombas.search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
