<?php

use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\MyProfileController;
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

    });
});
