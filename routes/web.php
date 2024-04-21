<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('login');
// });

Route::get('/', function () {
    return redirect(route('login'));
});

// Route::get('/adminindex', function () {
//     return view('admin.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


//  Admin
Route::middleware(['auth', 'cekRole:1'])->group(function () {
    Route::get('/admin', [UserController::class, 'index'])->name('admin-index');
    Route::post('/admin/create', [UserController::class, 'store'])->name('admin-store');
    Route::get('/admin/create', [UserController::class, 'create'])->name('admin-create');
});

// Prodi
Route::middleware(['auth', 'cekRole:2'])->group(function () {
});

// Mahasiswa
Route::middleware(['auth', 'cekRole:3'])->group(function () {

});


require __DIR__.'/auth.php';
