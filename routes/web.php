<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MatkulController;
use App\Http\Controllers\MahasiswaController;

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
    return view('dashboard.dashboard');
});

// Matkul routes
Route::get('/matkul', [MatkulController::class, 'index'])->name('matkul.index');
Route::get('/matkul/create', [MatkulController::class, 'create'])->name('matkul.create');
Route::post('/matkul', [MatkulController::class, 'store'])->name('matkul.store');
Route::get('/matkul/{id}/edit', [MatkulController::class, 'edit'])->name('matkul.edit');
Route::put('/matkul/{id}', [MatkulController::class, 'update'])->name('matkul.update');
Route::delete('/matkul/{id}', [MatkulController::class, 'destroy'])->name('matkul.destroy');

// Mahasiswa routes
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');
Route::get('/mahasiswa/create', [MahasiswaController::class, 'create'])->name('mahasiswa.create');
Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('mahasiswa.store');
Route::get('/mahasiswa/{id}/edit', [MahasiswaController::class, 'edit'])->name('mahasiswa.edit');
Route::put('/mahasiswa/{id}', [MahasiswaController::class, 'update'])->name('mahasiswa.update');
Route::delete('/mahasiswa/{id}', [MahasiswaController::class, 'destroy'])->name('mahasiswa.destroy');