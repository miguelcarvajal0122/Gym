<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UserController;

// Landing page pública
Route::get('/', function () {
    return view('auth.landing');
});

// Rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {

    // Dashboard
    Route::get('/dashboard', fn () => view('dashboard'))->name('dashboard');

    // Perfil del usuario autenticado
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD para planes, suscripciones y pagos
    Route::resources([
        'planes' => PlanController::class,
        'suscripciones' => SuscripcionController::class,
        'pagos' => PagoController::class,
    ]);
   
        Route::resource('users', UserController::class);
    

});

// Rutas de autenticación (login, registro, etc.)
require __DIR__.'/auth.php';