<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\ErrorGenerateController;

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
Route::controller(UserController::class)->group(function(){
    Route::post('register', 'create');
});
// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::resource('user', HomeController::class);
Route::get('user-types',[HomeController::class,'getUserTypes']);
Route::post('sendFeedback',[HomeController::class,'Feedback']);
Route::post('generateOTP',[UserController::class,'generateOTP']);
Route::post('phoneVerification',[UserController::class,'verifyOTP']);
Route::middleware('auth:sanctum')->group( function () {
    Route::post('sendFeedback',[HomeController::class,'Feedback']);
    Route::post('reviewMyRestaurant',[ReviewController::class,'review']);
    Route::get('getProfile',[UserController::class,'getProfile']);
    Route::post('dobUpdate',[UserController::class,'dobUpdate']);
    Route::post('uploadImage',[UserController::class,'uploadImage']);
    Route::post('editProfile',[UserController::class,'editProfile']);
    Route::get('errorReportList',[ErrorGenerateController::class,'errorReportList']);
});
