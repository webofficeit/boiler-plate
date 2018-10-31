<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\DownloadController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::post('ammap/search', [HomeController::class, 'searchmap'])->name('ammap.search');
Route::get('user/{id}', [CategoryController::class, 'index'])->name('user/{id}');
Route::get('category/{slug}', [CategoryController::class, 'getParticularCategory'])->name('category/{slug}');
Route::get('{slug}/offerlist/{userid}', [ProductController::class, 'index'])->name('{slug}/offerlist/{userid}');
Route::get('{slug}/offer/{id}', [ProductController::class, 'detailview'])->name('{slug}/offer/{id}');
Route::get('{slug}/offer/download/{filename}/{userid}', [DownloadController::class, 'downloadfile'])->name('download');

Route::get('list/{id}', [CategoryController::class, 'listDetails'])->name('list/{id}');
Route::post('category/search', [CategoryController::class, 'getAllProduct'])->name('category.search');
Route::get('offer', [CategoryController::class, 'listDetails'])->name('offer');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');

        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
        
        
    });
});
