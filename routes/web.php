<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\SuscripcionController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\UserController;

// Landing page
Route::get('/', function () {
    return view('auth.landing');
});

// Dashboard (acceso solo para usuarios autenticados)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Rutas protegidas solo para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
});



Route::middleware(['auth'])->group(function () {
    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de planes, suscripciones y pagos
    Route::resource('planes', PlanController::class);
    Route::resource('suscripciones', SuscripcionController::class);
    Route::resource('pagos', PagoController::class);
});

// Autenticación (login, registro, etc.)
require __DIR__.'/auth.php';