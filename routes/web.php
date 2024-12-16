<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
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

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [AuthController::class, 'update'])->name('profile.update');

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/search', [SearchController::class, 'search'])->name('home.search');


// Route Auth
Route::group(['prefix' => 'auth', 'as' => 'auth.'], function () {
    Route::get('signup', function () {
        return view('signup');
    })->name('signup');
    Route::get('signin', function () {
        return view('signin');
    })->name('signin');
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // GOOGLE
    Route::get('google/redirect', [AuthController::class, 'redirect'])->name('redirect');

    Route::get('google/callback', [AuthController::class, 'callback'])->name('callback');
});



// Route Gambar
Route::group(['prefix' => 'image', 'as' => 'image.'], function () {
    Route::get('create', [ImageController::class, 'create'])->name('create');
    Route::get('show/{image}', [ImageController::class, 'show'])->name('show');
    Route::post('store', [ImageController::class, 'store'])->name('store');
    Route::post('newalbum', [AlbumController::class, 'store'])->name('newalbum');
    Route::get('edit/{image}', [ImageController::class, 'edit'])->name('edit');
    Route::put('update/{image}', [ImageController::class, 'update'])->name('update');
    Route::put('updatealbum/{album}', [AlbumController::class, 'update'])->name('updatealbum');
    Route::delete('deletealbum/{album}', [AlbumController::class, 'delete'])->name('deletealbum');
    Route::delete('delete/{image}', [ImageController::class, 'delete'])->name('delete');

    // UNDUH
    Route::get('/download/{id}', [ImageController::class, 'download'])->name('download');
});

Route::post('/comment', [CommentController::class, 'comment'])->name('comment');


Route::get('/phpinfo', function () {
    phpinfo();
});
