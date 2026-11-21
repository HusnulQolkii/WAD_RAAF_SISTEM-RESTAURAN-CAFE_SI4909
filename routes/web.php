<?php

use App\Http\Controllers\CafeController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect('/pegawai'));

Route::prefix('{modul}')
    ->where(['modul' => 'pegawai'])
    ->group(function () {
        Route::get('/', [CafeController::class, 'index'])->name('cafe.index');
        Route::get('/tambah', [CafeController::class, 'create'])->name('cafe.create');
        Route::post('/', [CafeController::class, 'store'])->name('cafe.store');
        Route::get('/{id}/edit', [CafeController::class, 'edit'])->whereNumber('id')->name('cafe.edit');
        Route::put('/{id}', [CafeController::class, 'update'])->whereNumber('id')->name('cafe.update');
        Route::delete('/{id}', [CafeController::class, 'destroy'])->whereNumber('id')->name('cafe.destroy');
    });