<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use App\Http\Controllers\Home;
use App\Http\Controllers\UserController;


Route::get('/', [Home::class, 'show'])->name('home');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);


Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}/show', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/edit/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::post('/posts/update/{post}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy']);

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('user.posts');
Route::get('manage/user/{user}', [UserController::class, 'viewDetails'])->name('manage.user');
Route::post('manage/user/update/{user}', [UserController::class, 'update'])->name('manage.user.update');

Route::get('/user/{user}', [UserController::class, 'user_profile'])->name('user.profile');
Route::post('/user/{user}/update', [UserController::class, 'user_update'])->name('user.profile.update');