<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\BlogController;
use Illuminate\Support\Str;
use App\Models\User;
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

Route::get('/', function () {
    return view('welcome');
});


Route::controller(AuthController::class)->group(function() {
    Route::get('/register', 'showRegister')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'showLogin')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::prefix('/blog')->controller(BlogController::class)->group(function() {
    Route::get('/', 'showIndex')->name('blog');
    Route::get('/formblog', 'showFormBlog')->name('blog.formblog');

});

