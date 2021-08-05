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
use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;

Route::post('/user/create', [AuthController::class, 'create']);
Route::post('/user/authenticate', [AuthController::class, 'authenticate']);

Route::middleware('auth:api')->post('/book/getUserBooks', [BookController::class, 'getUserBooks']);
Route::middleware('auth:api')->post('/book/getBooks', [BookController::class, 'getBooks']);
Route::middleware('auth:api')->post('/book/getPercent', [BookController::class, 'getPercent']);

Route::middleware('auth:api')->post('/test/getTests', [TestController::class, 'getTests']);
Route::middleware('auth:api')->post('/test/checkAnswer', [TestController::class, 'checkAnswer']);

Route::middleware('auth:api')->post('/task/getTasks', [TaskController::class, 'getTasks']);
Route::middleware('auth:api')->post('/task/getPassedTasks', [TaskController::class, 'getPassedTasks']);

Route::middleware('auth:api')->post('/book/add', [BookController::class, 'add']);
Route::middleware('auth:api')->post('/task/add', [TaskController::class, 'add']);
Route::middleware('auth:api')->post('/test/add', [TestController::class, 'add']);

Route::middleware('auth:api')->post('/user/addBook', [UserController::class, 'addBook']);
Route::middleware('auth:api')->post('/user/addPassedTask', [UserController::class, 'addPassedTask']);