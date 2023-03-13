<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchApi;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\AddmodelController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\buyerController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get("data", [searchApi::class, 'getData']);

    Route::get("list", [VehicleController::class, 'list']);
    Route::post("add", [VehicleController::class, 'add']);
    Route::get("search/{make}", [VehicleController::class, 'search']);

   
    
    
});

Route::post('login', [VehicleController::class, 'login']);
Route::post('upload',[FileController::class,'upload']);
Route::post('addmodel', [AddmodelController::class,'add']);

Route::get('resizeImage', [ImageController::class, 'resizeImage']);
Route::post('resizeImagePost', [ImageController::class, 'store'])->name('resizeImagePost');
Route:: post('register',[buyerController::class, 'register']);
Route::get('models', [VehicleController::class, 'fetchmodels']);
Route::get('makes', [VehicleController::class, 'fetchmakes']);

