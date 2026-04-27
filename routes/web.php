<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdukController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', [AuthController::class, 'tampilkanLogin'])->name('login');
Route::post('/login', [AuthController::class, 'prosesLogin']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/profil', [AuthController::class, 'profil'])->name('profil');
Route::get('/pengelolaan', [ProdukController::class, 'index'])->name('pengelolaan');
Route::post('/produk', [ProdukController::class, 'simpan'])->name('produk.simpan');
Route::get('/produk/{id}/edit', [ProdukController::class, 'edit'])->name('produk.edit');
Route::put('/produk/{id}', [ProdukController::class, 'perbarui'])->name('produk.perbarui');
Route::delete('/produk/{id}', [ProdukController::class, 'hapus'])->name('produk.hapus');
