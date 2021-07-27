<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Models\Category;
use App\Models\Forum;
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
