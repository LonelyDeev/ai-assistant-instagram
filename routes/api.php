<?php

use App\Http\Controllers\Api\V1\AuthController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\Api\V1\PlanController;
use App\Http\Controllers\Api\V1\ContentController;
use App\Http\Controllers\Api\V1\GenerateContentController;
use App\Http\Controllers\Api\V1\TransactionController;
use App\Http\Controllers\Api\V1\ToolController;
use App\Http\Controllers\Api\V1\ChatAiController;
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

Route::group(['prefix' => 'v1'], function () {
    Route::post('/login', [AuthController::class,'login']);
    Route::post('/verify-mobile', [AuthController::class,'verifyMobile']);


    Route::middleware('auth:sanctum')->group(function () {

        Route::get('/user', [UserController::class,'index']);

        Route::get('/plans', [PlanController::class,'index']);
        Route::post('/buy-plans', [PlanController::class,'buyPlans']);
        Route::get('/buy-plans/zarinpal-verify', [PlanController::class, 'zarinpalVerifyApi'])->name('zarinpal_verify');

        Route::resource('/content', ContentController::class)->only(['index', 'show']);

        Route::get('/tools', [ToolController::class,'index']);

        Route::resource('/generate', GenerateContentController::class)->only(['store']);

        Route::get('/transactions', [TransactionController::class,'index']);

        Route::post('/chat',[ChatAiController::class,'index']);
        Route::get('/get-image-chat/{chat_id}',[ChatAiController::class,'getImageChat']);

        Route::post('/logout', [AuthController::class,'logout']);
    });

});




