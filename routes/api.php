<?php

use App\Http\Controllers\Api\AdminController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\LikeController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\NewsController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\RoomsController;
use App\Http\Controllers\Api\StatusReservationController;
use App\Http\Controllers\Api\UserController;
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

Route::get('/loadInfoUser/{id}', [UserController::class, 'loadInfoUser']);
Route::post('/editProfile/{id}', [UserController::class, 'editUser']);

Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/signin', [AuthController::class, 'signin']);

Route::get('/news', [NewsController::class, 'readAll']);
Route::post('/addNews', [NewsController::class, 'addNews']);
Route::get('/news/{id}', [NewsController::class, 'oneNews']);
Route::post('/editNews/{id}', [NewsController::class, 'updateNews']);
Route::get('/deleteNews/{id}', [NewsController::class, 'deleteNews']);
Route::post('/searchAllNews', [NewsController::class, 'searchAllNews']);

Route::get('/rooms', [RoomsController::class, 'readAll']);
Route::post('/addRoom', [RoomsController::class, 'addRoom']);
Route::get('/rooms/{id}', [RoomsController::class, 'oneRoom']);
Route::post('/editRoom/{id}', [RoomsController::class, 'updateRoom']);
Route::get('/deleteRoom/{id}', [RoomsController::class, 'deleteRoom']);
Route::post('/searchAllRooms', [RoomsController::class, 'searchAllRooms']);

Route::get('/main', [MainController::class, 'readNewsAndRooms']);
Route::post('/searchRooms', [MainController::class, 'searchRooms']);

Route::post('/reservationRoom', [ReservationController::class, 'addReservation']);
Route::post('/loadInfoReservation', [ReservationController::class, 'loadInfoReservation']);
Route::get('/userRooms/{id}', [ReservationController::class, 'userRooms']);

Route::post('/addStatusReservation', [StatusReservationController::class, 'addStatusReservation']);

Route::post('/like', [LikeController::class, 'like']);
Route::post('/checkLike', [LikeController::class, 'checkLike']);
Route::post('/deleteLike', [LikeController::class, 'deleteLike']);

