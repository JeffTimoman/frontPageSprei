<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\admin\DepartementController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AdminController::class, 'index'])->name('admin.index');

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::delete('/', [UserController::class, 'destroy'])->name('admin.user.destroy');
        Route::get('/create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('/create', [UserController::class, 'store'])->name('admin.user.create');
    });

    Route::prefix('departement')->group(function () {
        Route::get('/', [DepartementController::class, 'index'])->name('admin.departement.index');
        Route::post('/', [DepartementController::class, 'store'])->name('admin.departement.store');
        Route::put('/', [DepartementController::class, 'update'])->name('admin.departement.update');
    });

    Route::prefix('product')->group(function () {
        Route::get('/create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::post('/create', [ProductController::class, 'store'])->name('admin.product.create');
    });

    Route::prefix('transaction')->group(function () {

    });
});
