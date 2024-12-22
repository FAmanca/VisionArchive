<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BannedController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/banned', [BannedController::class, 'index'])->name('banned');

Route::post('/sendreport{image}', [ReportController::class, 'create'])->name('sendreport');

// Admin
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['checkadmin']], function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/manageusers', [UsersController::class, 'index'])->name('manageusers');
    Route::get('/searchuser', [UsersController::class, 'search'])->name('searchuser');
    Route::get('/reports', [ReportController::class, 'index'])->name('report');
    Route::post('/ban/{user}', [BannedController::class, 'banned'])->name('banuser');
    Route::delete('/deleteimage/{image}', [ReportController::class, 'deleteimage'])->name('deleteimage');
});

Route::group(['prefix' => 'profile', 'middleware' => ['checklogin'], 'as' => 'profile.'], function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');
    Route::post('/update', [AuthController::class, 'update'])->name('update');
});


Route::get('/home', [HomeController::class, 'index'])
    ->name('home')
    ->middleware('banned');

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
Route::get('show/{image}', [ImageController::class, 'show'])->name('image.show');
Route::group(['prefix' => 'image', 'as' => 'image.', 'middleware' => ['checklogin', 'banned']], function () {
    Route::get('like/{image}', [LikeController::class, 'like'])->name('like');
    Route::get('create', [ImageController::class, 'create'])->name('create');
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
