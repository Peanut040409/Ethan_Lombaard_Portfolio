<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    if (auth()->check()) {
        return redirect('/admin/dashboard'); // or your admin page
    }
    return redirect('/admin/login');
});

Route::get('/admin/dashboard', function () {
    return '<h1>Admin Dashboard Test</h1><p>If you see this, the route works!</p>';
})->middleware('auth')->name('admin.dashboard');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
