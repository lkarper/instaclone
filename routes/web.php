<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FollowsController;
use App\Mail\NewUserWelcomeMail;

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

Route::get('/email', function() {
    return new NewUserWelcomeMail();
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [PostsController::class, 'index']);
Route::get('/p/create', [PostsController::class, 'create']);
Route::post('/p', [PostsController::class, 'store']);
Route::get('/p/{post}', [PostsController::class, 'show']);
Route::post('/follow/{user}', [FollowsController::class, 'store']);

Route::get('/profiles/{user}', [ProfilesController::class, 'index'])->name('profile.show');
Route::get('/profiles/{user}/edit', [ProfilesController::class, 'edit'])->name('profile.edit');
Route::patch('/profiles/{user}', [ProfilesController::class, 'update'])->name('profile.update');
