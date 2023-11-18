<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\RootController;

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

// Root Router ( / )
Route::controller(RootController::class)->group(function () {
    Route::get('/', 'root')->name('home');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('/test', 'test')->name('testing');
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('/blog')->controller(BlogController::class)->group(function () {
    Route::get('/', 'showIndex')->name('blog');
    Route::get('/addblog', 'showFormBlog')->name('blog.addblog');
    Route::post('/store', 'store')->name('blog.store');
    Route::post('/delete', 'delete')->name('blog.delete');
});

Route::prefix('/category')->controller(CategoryController::class)->group(function () {
    Route::get('/', 'index')->name('category');
    Route::post('/store', 'store')->name('category.store');
    Route::post('/destroy', 'destroy')->name('category.destroy');
});
