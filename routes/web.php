<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThreadController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
Route::get('/thread/create', [ThreadController::class, 'create']);
Route::get('/forum/{id}/thread/create', [ThreadController::class, 'forumThread']);
Route::post('/forum', [ThreadController::class, 'store']);
Route::post('/forum/{id}', [ThreadController::class, 'store']);
Route::get('/forum/{id}', [ForumController::class, 'show']);
Route::get('/forum/{forum_id}/thread/{thread_slug}/{thread_type}', [ThreadController::class, 'show']);
Route::post('/forum/{forum_id}/thread/{thread_slug}/{thread_type}/reply', [PostController::class, 'store']);


Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', function () {
    return view("auth.login");
});


Route::post('/login', [LoginController::class, 'authenticate']);

Route::group(["prefix" => "admin", "middleware" => "isStaff"], function () {
    Route::get('/', function () {
        return view('admin.main');
    });

    Route::get('/create/category', [CategoryController::class, 'create']);

    Route::get('/create/forum', [ForumController::class, 'create']);

    Route::post('/category', [CategoryController::class, 'store']);

    Route::post('/forum', [ForumController::class, 'store']);
});


Route::get('/profile/{username}', [ProfileController::class, 'show']);


Route::get("/me", [ProfileController::class, 'me']);
