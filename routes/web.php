<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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

Route::get('/home', function () {
    return view('home');
});

Route::get('/create', function () {
    return view('create');
});

Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('signup', function () {
        return view('signup');
    })->name('signup');
    Route::get('signin', function () {
        return view('signin');
    })->name('signin');
    Route::post('register', [AuthController::class,'register'])->name('register');
    Route::post('login', [AuthController::class,'login'])->name('login');
});



