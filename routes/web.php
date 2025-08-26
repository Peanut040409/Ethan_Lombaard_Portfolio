<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GreetingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/admin/greetings', [GreetingsController::class, 'index'])->name('admin.greetings.index');
    Route::post('/admin/greetings', [GreetingsController::class, 'store'])->name('admin.greetings.store');
    Route::delete('/admin/greetings/{id}', [GreetingsController::class, 'destroy'])->name('admin.greetings.destroy');
    Route::put('/admin/greetings/{id}', [GreetingsController::class, 'update'])->name('admin.greetings.update');


Route::get('/images', function () {
    return '<h1>WIP, images page</h1>';
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
