<?php

use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\PollingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Models\Matakuliah;
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
    Route::patch('/admin/edit/{id}', [UserController::class, 'update'])->name('admin-update');
    Route::get('/admin/edit/{id}', [UserController::class, 'edit'])->name('admin-edit');
    Route::get('/admin/delete/{id}', [UserController::class, 'destroy'])->name('admin-delete');
});

// Prodi
Route::middleware(['auth', 'cekRole:2'])->group(function () {

    // MataKuliah
    Route::get('/prodi/matakuliah', [MatakuliahController::class, 'index'])->name('mk-index');
    Route::post('/prodi/matakuliah/create', [MatakuliahController::class, 'store'])->name('mk-store');
    Route::get('/prodi/matakuliah/create', [MatakuliahController::class, 'create'])->name('mk-create');
    Route::patch('/prodi/edit/{id}', [MatakuliahController::class, 'update'])->name('mk-update');
    Route::get('/prodi/edit/{id}', [MatakuliahController::class, 'edit'])->name('mk-edit');
    Route::get('/prodi/delete/{id}', [MatakuliahController::class, 'destroy'])->name('mk-delete');

    // Polling
    Route::get('/prodi/polling', [PollingController::class, 'index'])->name('poll-index');
    Route::post('/prodi/polling/create', [PollingController::class, 'store'])->name('poll-store');
    Route::get('/prodi/polling/create', [PollingController::class, 'create'])->name('poll-create');
    Route::patch('/prodi/polling/edit/{id}', [PollingController::class, 'update'])->name('poll-update');
    Route::get('/prodi/polling/edit/{id}', [PollingController::class, 'edit'])->name('poll-edit');
    Route::get('/prodi/polling/delete/{id}', [PollingController::class, 'destroy'])->name('poll-delete');
});

// Mahasiswa
Route::middleware(['auth', 'cekRole:3'])->group(function () {

});


require __DIR__.'/auth.php';
