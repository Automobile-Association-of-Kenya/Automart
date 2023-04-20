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

/** Pass data encoded string of compressed image to this route the data format should {unique_string:value, image:'data:image/jpg, image data encoded string'} the images should be sent one by one*/
Route::post('imagecompress', [api\VehicleControlller::class, 'handleImages']);
/** Send vehicle information here including id of authenticated user, and the unique string in the above route in the format {user_id:value,str_id:value,....} */
Route::post('vehicle/store', [api\VehicleControlller::class, 'store']);

/** Vehicle images update/addition */


