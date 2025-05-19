<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PalestraController;

// Página inicial
Route::get('/', function () {
    return view('welcome');
});

// Exportar PDF
Route::get('/palestras/pdf', [PalestraController::class, 'exportarPDF'])->name('palestras.pdf');

// Rota temporária para testar a view PDF
Route::get('/teste-pdf-view', function () {
    $palestras = \App\Models\Palestra::orderBy('data_hora')->get();
    return view('palestras.pdf', compact('palestras'));
});

// CRUD das palestras
Route::resource('palestras', PalestraController::class);
