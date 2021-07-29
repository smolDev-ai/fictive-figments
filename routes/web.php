<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThreadController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/forum', [CategoryController::class, 'index']);
Route::get('/forum/{id}', [ForumController::class, 'show']);
Route::get('/forum/threads/{id}', [ThreadController::class, 'show']);
Route::post('/forum/threads/{id}/reply', [PostController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', function () {
    return view("auth.login");
});


Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/logout', function () {
    return Auth::logout();
});
