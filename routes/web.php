<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;

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
    return view('landing');
});

Route::get('/profile', [ProfileController::class,'index'])->name('profile');

Route::get('/home', [HomeController::class,'index'])->name('home');

// Route Auth
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('signup', function () {
        return view('signup');
    })->name('signup');
    Route::get('signin', function () {
        return view('signin');
    })->name('signin');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
});

// Route Gambar
Route::group(['prefix'=> 'image','as'=> 'image.'], function () {
    Route::get('create', [ImageController::class,'create'])->name('create');
    Route::post('store', [ImageController::class,'store'])->name('store');
    Route::post('newalbum', [AlbumController::class,'store'])->name('newalbum');
    Route::delete('/image/{image}', [ImageController::class, 'delete'])->name('delete');
});




