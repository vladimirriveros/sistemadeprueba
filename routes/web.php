<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\DashboardController;

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::controller(CategoriaController::class)->group(function () {
        Route::get('/categorias', 'index')->name('admin.categorias.index');
        Route::post('/categorias', 'store')->name('admin.categorias.store');
        Route::put('/categorias/{id}', 'update')->name('admin.categorias.update');
        Route::delete('/categorias/{id}', 'destroy')->name('admin.categorias.destroy');
    });
