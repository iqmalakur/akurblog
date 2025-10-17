<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home']);
})->name('home');

Route::patch('posts/publish/{id}', [PostController::class, 'publish'])->name('posts.publish');
Route::resource('posts', PostController::class);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login.show');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.show');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/users/me', [UserController::class, 'index'])->name('users.me');
