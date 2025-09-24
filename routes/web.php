<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('homeBefore');
})->name('homeBefore');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');
Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

Route::middleware('auth')->group(function () {
    Route::get('/home', [PostController::class, 'index'])->name('home');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('posts.show');
    // Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/posts/{id}/edit', [DashboardController::class, 'edit'])
        ->name('postsDash.edit');
    Route::put('/dashboard/posts/{id}', [DashboardController::class, 'update'])
        ->name('postsDash.update');
});


Route::resource('posts', PostController::class);

Route::resource('users', UserController::class)->except(['index', 'create', 'store', 'show']);
Route::get('/users', [DashboardController::class, 'index']);
Route::get('/posts', [DashboardController::class, 'index']);
Route::get('/load-more', [DashboardController::class, 'loadMore'])->name('load.more');


