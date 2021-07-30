<?php

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


use App\Http\Controllers\BookController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AuthController;

Route::middleware('auth:api')->post('/book/add', [BookController::class, 'add']);
Route::post('/task/add', [TaskController::class, 'add']);
Route::post('/test/add', [TestController::class, 'add']);
Route::post('/user/create', [AuthController::class, 'create']);