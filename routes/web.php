<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PalestraController; // ← fora da Route

Route::get('/', function () {
    return view('welcome');
});

// Rota CRUD para palestras
Route::resource('palestras', PalestraController::class);
