<?php

use App\Http\Controllers\AuthController;
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

Route::group(['prefix' => 'auth'], function () {
    // регистрация пользователя по телефону
    Route::post('sign-up', [AuthController::class, 'signUp']);
    //логин по номеру телефона
    Route::post('login', [AuthController::class, 'login']);
    //подтверждение кода из смс и получение токена
    Route::post('confirm-code', [AuthController::class, 'confirmCode']);
});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
