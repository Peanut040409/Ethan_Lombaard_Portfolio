<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GreetingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/admin/greetings', [GreetingsController::class, 'index'])->name('admin.greetings.index');
    Route::post('/admin/greetings', [GreetingsController::class, 'store'])->name('admin.greetings.store');
    Route::delete('/admin/greetings/{id}', [GreetingsController::class, 'destroy'])->name('admin.greetings.destroy');
    Route::put('/admin/greetings/{id}', [GreetingsController::class, 'update'])->name('admin.greetings.update');

    Route::get('/admin/images/', [ImagesController::class, 'index'])->name('admin.images.index');
    Route::post('/admin/images/', [ImagesController::class, 'store'])->name('admin.images.store');
    Route::get('/admin/images/create-image-form', [ImagesController::class, 'createForm'])->name('admin.images.index.forms.create');
    Route::delete('/admin/images/{id}', [ImagesController::class, 'destroy'])->name('admin.images.destroy');
    Route::put('/admin/images/{id}', [ImagesController::class, 'update'])->name('admin.images.update');
    Route::get('/admin/images/edit-image-form', [ImagesController::class, 'editForm'])->name('admin.images.index.forms.edit');
});

require __DIR__.'/auth.php';
