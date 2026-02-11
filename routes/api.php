<?php

use App\Http\Controllers\Api\LoginController;
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
        Route::middleware('auth:sanctum')->group(function () {


        });
    });

    Route::middleware('auth:sanctum')->group(function () {

    });
});
