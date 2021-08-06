<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PrivateMessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ThreadController;
use App\Http\Controllers\UserNotificationController;
use App\Models\Category;
use App\Models\Private_Message;
use App\Models\ThreadSubscription;
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
Route::get('/forum/{id}', [ForumController::class, 'show']);


Route::get('/forum/{id}/thread/create', [ThreadController::class, 'forumThread']);
Route::get('/thread/create', [ThreadController::class, 'create']);
Route::post('/forum', [ThreadController::class, 'store']);
Route::post('/forum/{id}', [ThreadController::class, 'store']);

Route::post('/forum/{forum_id}/thread/{thread_slug}/subscribe', [ThreadSubscriptionController::class, 'store'])->middleware('auth');
Route::delete('/forum/{forum_id}/thread/{thread_slug}/unsubscribe', [ThreadSubscriptionController::class, 'store'])->middleware('auth');

Route::get('/forum/{forum_id}/thread/{thread_slug}/{thread_type}', [ThreadController::class, 'show']);
Route::get('/forum/{forum_id}/thread/{thread_slug}', [ThreadController::class, 'show']);
Route::delete('/forum/{forum_id}/thread/{thread_slug}/{thread_type}/delete', [ThreadController::class, 'destroy']);



Route::post('/forum/{forum_id}/thread/{thread_slug}/{thread_type}/reply', [PostController::class, 'store']);
Route::post('/forum/{forum_id}/thread/{thread_slug}/reply', [PostController::class, 'store']);


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


Route::get('/profile/{slugified_user}', [ProfileController::class, 'show']);
Route::get('/profile/{slugified_user}/private-message', [PrivateMessageController::class, 'create']);


Route::get("/me", [ProfileController::class, 'me']);
Route::get("/me/notifications", [UserNotificationController::class, 'index']);
Route::get("/me/notifications/{notificationId}", [UserNotificationController::class, 'show']);
Route::delete("/me/notifications/{notificationId}", [UserNotificationController::class, 'destroy']);
Route::get('/me/private-messages', [PrivateMessageController::class, 'index']);
Route::get('/me/private-message', [PrivateMessageController::class, 'create']);
Route::post('/private-messages', [PrivateMessageController::class, 'store']);
