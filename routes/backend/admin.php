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
Route::post('category/editupdate', [CategoryController::class, 'editupdate'])->name('category.editupdate');
Route::post('product/editupdate', [ProductController::class, 'editupdate'])->name('product.editupdate');
Route::post('category/updateimage', [CategoryController::class, 'updateimage'])->name('category.updateimage');
Route::post('product/updateimage', [ProductController::class, 'updateimage'])->name('product.updateimage');
Route::get('product/confirm', [ProductController::class, 'confirmindex'])->name('product.confirm')->middleware('section.owner');

Route::group(['prefix' => 'category/{category}'], function () {
            Route::get('edit', [CategoryController::class, 'edit'])->name('category.edit');
            Route::delete('category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');
        });
        
Route::group(['prefix' => 'product/{product}'], function () {
            Route::get('edit', [ProductController::class, 'edit'])->name('product.edit');
            Route::delete('product/destroy', [ProductController::class, 'destroy'])->name('product.destroy');
        }); 
        