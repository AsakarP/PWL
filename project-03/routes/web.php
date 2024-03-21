<?php

use App\Http\Controllers\KartuKeluargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/starter', function () {
    return view('starter');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/kk', [KartuKeluargaController::class, 'index'])->name('kk-list');
Route::get('/kk-create', [KartuKeluargaController::class, 'create'])->name('kk-create');
Route::post('/kk-create', [KartuKeluargaController::class, 'store'])->name('kk-store');
Route::get('/kk-edit/{kartuKeluarga}', [KartuKeluargaController::class, 'edit'])->name('kk-edit');
Route::post('/kk-edit/{kartuKeluarga}', [KartuKeluargaController::class, 'update'])->name('kk-update');
Route::get('/kk-delete/{kartuKeluarga}', [KartuKeluargaController::class, 'destroy'])->name('kk-delete');

Route::get('/ctz', [KartuKeluargaController::class, 'index'])->name('ctz-list');
Route::get('/ctz-create', [KartuKeluargaController::class, 'create'])->name('ctz-create');
Route::post('/ctz-create', [KartuKeluargaController::class, 'store'])->name('ctz-store');
