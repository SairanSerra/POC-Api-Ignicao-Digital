<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1'], function(){

    Route::post('/user/create', [UserController::class, 'create']);

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

    Route::group(['prefix' => '/client', 'middleware' => 'auth'], function(){

        Route::get('/', [ClientController::class, 'index']);
        Route::post('/create', [ClientController::class, 'create']);
        Route::put('/update', [ClientController::class, 'update']);
        Route::delete('/delete/{IdClient}', [ClientController::class, 'delete']);
    });

});
