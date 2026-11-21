<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

// ---------- Login & Register (hanya untuk tamu) ----------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ---------- Halaman yang wajib login ----------
Route::middleware('auth')->group(function () {
    Route::get('/', fn () => redirect('/supplier'));

    Route::prefix('{modul}')
        ->where(['modul' => 'supplier'])
        ->group(function () {
            Route::get('/', [CafeController::class, 'index'])->name('cafe.index');
            Route::get('/tambah', [CafeController::class, 'create'])->name('cafe.create');
            Route::post('/', [CafeController::class, 'store'])->name('cafe.store');
            Route::get('/{id}/edit', [CafeController::class, 'edit'])->whereNumber('id')->name('cafe.edit');
            Route::put('/{id}', [CafeController::class, 'update'])->whereNumber('id')->name('cafe.update');
            Route::delete('/{id}', [CafeController::class, 'destroy'])->whereNumber('id')->name('cafe.destroy');
        });
});
