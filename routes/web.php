<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MataKuliahController;

// 🔹 Mahasiswa
Route::get('mahasiswas/trash', [MahasiswaController::class, 'trash'])->name('mahasiswas.trash');
Route::post('mahasiswas/{id}/restore', [MahasiswaController::class, 'restore'])->name('mahasiswas.restore');
Route::delete('mahasiswas/{id}/force-delete', [MahasiswaController::class, 'forceDelete'])->name('mahasiswas.forceDelete');
Route::resource('mahasiswas', MahasiswaController::class);

// 🔹 Dosen
Route::get('dosens/trash', [DosenController::class, 'trash'])->name('dosens.trash');
Route::post('dosens/{id}/restore', [DosenController::class, 'restore'])->name('dosens.restore');
Route::delete('dosens/{id}/force-delete', [DosenController::class, 'forceDelete'])->name('dosens.forceDelete');
Route::resource('dosens', DosenController::class);

// 🔹 Mata Kuliah
Route::get('mata_kuliahs/trash', [MataKuliahController::class, 'trash'])->name('mata_kuliahs.trash');
Route::post('mata_kuliahs/{id}/restore', [MataKuliahController::class, 'restore'])->name('mata_kuliahs.restore');
Route::delete('mata_kuliahs/{id}/force-delete', [MataKuliahController::class, 'forceDelete'])->name('mata_kuliahs.forceDelete');
Route::resource('mata_kuliahs', MataKuliahController::class);

Route::get('/', function () {
    return view('welcome');
});
