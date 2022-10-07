<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchApi;
use App\Http\Controllers\VehicleController;

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

Route::get("data", [searchApi:: class, 'getData']); 

Route:: get("list/{id?}", [VehicleController::class, 'list']);
Route:: post("add", [VehicleController:: class,'add']);
Route:: get("search/{make}", [VehicleController::class,'search']);