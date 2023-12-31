<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/posts', function () {
    return view('posts.index');
});

Route::get('/login', [LoginController::class, 'index'])->name('login'); //last arrow part is  is me chaining the name
Route::post('/login', [LoginController::class, 'store']);

Route::post('/logout', [LogoutController::class, 'out'])->name('logout');

Route::get('/register', [RegisterController::class, 'index'])->name('register'); //last arrow part is chaining is me chaining the name
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

//POSTS
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{id}', [PostController::class, 'update'])->name('posts.update');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes'); //liking post
Route::delete('/posts/{post}/likes', [PostLikeController::class, 'destroy'])->name('posts.likes'); //unliking post

Route::get('/users/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');