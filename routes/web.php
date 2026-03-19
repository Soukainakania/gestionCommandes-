<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommandeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Routes CRUD commandes
Route::resource('commandes', CommandeController::class);

// Route statistiques commandes
Route::get('/statistiques', [CommandeController::class, 'statistiques']);

// Optional: placeholder login (باش إذا استعملتي middleware auth مؤقتاً)
Route::get('/login', function(){
    return "Page login placeholder";
})->name('login');
