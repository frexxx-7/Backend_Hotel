<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\RoomsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/adminInfo', [AdminController::class, 'adminInfo']);
});

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/news', [NewsController::class, 'readAll']);
Route::post('/addNews', [NewsController::class, 'addNews']);
Route::get('/news/{id}', [NewsController::class, 'oneNews']);
Route::post('/editNews/{id}', [NewsController::class,'updateNews']);
Route::get('/deleteNews/{id}', [NewsController::class,'deleteNews']);

Route::get('/rooms', [RoomsController::class, 'readAll']);
Route::post('/addRoom', [RoomsController::class, 'addRoom']);
Route::get('/rooms/{id}', [RoomsController::class, 'oneRoom']);
Route::post('/editRoom/{id}', [RoomsController::class,'updateRoom']);
Route::get('/deleteRoom/{id}', [RoomsController::class,'deleteRoom']);

Route::get('/main', [MainController::class, 'readNewsAndRooms']);
Route::post('/searchRooms', [MainController::class, 'searchRooms']);