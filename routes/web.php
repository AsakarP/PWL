<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KurikulumController;
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    } else {
        return view('auth.login');
    }
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [UserController::class, 'profile'])->name('profile');
    Route::post('profile/edit-photo/{user:nrp}', [UserController::class, 'updatephoto'])->name('update-profile-photo');
    Route::get('profile/delete-photo/{user:nrp}', [UserController::class, 'deletePhoto'])->name('delete-profile-photo');

    Route::get('user', [UserController::class, 'index'])->name('user');
    Route::post('user', [UserController::class, 'store'])->name('user-store');
    Route::post('user/{user}', [UserController::class, 'update'])->name('user-update');
    Route::get('user/{user}', [UserController::class, 'destroy'])->name('user-delete');

    Route::get('kurikulum', [KurikulumController::class, 'index'])->name('kurikulum');
    Route::post('kurikulum', [KurikulumController::class, 'store'])->name('kurikulum-store');
    Route::post('kurikulum/{kurikulum}', [KurikulumController::class, 'update'])->name('kurikulum-update');
    Route::get('kurikulum/{kurikulum}', [KurikulumController::class, 'destroy'])->name('kurikulum-delete');

    Route::get('mata-kuliah', [MataKuliahController::class, 'index'])->name('mata-kuliah');
    Route::get('mata-kuliah/by-kurikulum/{kurikulum}', [MataKuliahController::class, 'indexFilterKurikulum'])->name('mata-kuliah-filter-kurikulum');
    Route::post('mata-kuliah', [MataKuliahController::class, 'store'])->name('mata-kuliah-store');
    Route::post('mata-kuliah/{mataKuliah}', [MataKuliahController::class, 'update'])->name('mata-kuliah-update');
    Route::get('mata-kuliah/{mataKuliah}', [MataKuliahController::class, 'destroy'])->name('mata-kuliah-delete');

    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
});
Route::post('login', [AuthController::class, 'login'])->name('login');
