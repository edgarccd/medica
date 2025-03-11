<?php

use App\Http\Controllers\MedicoController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
    Route::get('/medicos/create', [MedicoController::class, 'create'])->name('medicos.create');
    Route::post('/medicos/store', [MedicoController::class, 'store'])->name('medicos.store');
    Route::get('/medicos/edit/{medico}', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::patch('/medicos/update/{medico}', [MedicoController::class, 'update'])->name('medicos.update');
    Route::delete('/medicos/{medico}', [MedicoController::class, 'destroy'])->name('medicos.destroy');
    Route::get('/medicos/search', [MedicoController::class, 'search'])->name('medicos.search');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('paypal-payment',[PayPalController::class,"payment"])->name('paypal.payment');
    Route::get('paypal-success',[PayPalController::class,"success"])->name('paypal.success');
    Route::get('paypal-cancel',[PayPalController::class,'cancel'])->name('paypal.cancel');

});

require __DIR__ . '/auth.php';
