<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('category', [CategoryController::class, 'index'])->name('category');
Route::get('category/add', [CategoryController::class, 'store'])->name('category.add');
Route::post('category/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('product',[ProductController::class, 'index'])->name('product');
Route::get('product/add', [ProductController::class, 'store'])->name('product.add');
Route::post('product/update', [ProductController::class, 'update'])->name('product.update');
