<?php

use App\Http\Controllers\Api\AllPostController;
use App\Http\Controllers\Api\CommentController;
use App\Http\Controllers\Api\ConnectionsController;
use App\Http\Controllers\Api\ConnectionsRequestController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\MyConnectionsRequestController;
use App\Http\Controllers\Api\MyProfileController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReadNotificationController;
use App\Http\Controllers\Api\SearchUserController;
use App\Http\Controllers\Api\UnReadNotificationCountController;
use App\Http\Controllers\Api\UpdateProfileController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(['middleware' => ['lang', 'acceptJson']], function () {
    Route::group(['prefix' => 'auth'], function () {
        Route::resource('login', LoginController::class);
        Route::resource('users', UserController::class);
        Route::middleware('auth:sanctum')->group(function () {
            Route::resource('my-profile', MyProfileController::class);
            Route::resource('update-profile', UpdateProfileController::class);
            Route::resource('logout', LogoutController::class);
        });
    });
    Route::middleware('auth:sanctum')->group(function () {
        Route::resource('search-users', SearchUserController::class);
        Route::resource('connections', ConnectionsController::class);
        Route::resource('connection-request', ConnectionsRequestController::class);
        Route::resource('my-connections-requests', MyConnectionsRequestController::class);
        Route::resource('posts', PostController::class);
        Route::resource('all-posts', AllPostController::class);
        Route::resource('comments', CommentController::class);
        Route::resource('likes', LikeController::class);
        Route::resource('notifications', NotificationController::class);
        Route::resource('read-notifications', ReadNotificationController::class);
        Route::resource('un-read-notifications-count', UnReadNotificationCountController::class);
    });
});
