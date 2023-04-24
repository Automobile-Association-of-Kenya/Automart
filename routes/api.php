<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\api\MainController;
use App\Http\Controllers\api\VehicleController;

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

/**
 * @param @base64 encoded individual image with @cover_image:true, @image and unique string to identify request
 */
Route::post('vehicle-images-upload', [VehicleController::class, 'uploadImages']);

/**
 * @param @base64 encoded individual image with @cover_image:true, @image and @vehicle_id
 */
Route::post('vehicle-images-update', [VehicleController::class, 'imagesUpdate']);
/**
 * @param @vehicles details
 */
Route::post('vehicle-update', [VehicleController::class, 'update']);


/**
 * Send vehicle information here including id of authenticated user, and the unique string in the above route in the format {user_id:value,str_id:value,....}
 *
 */
Route::post('vehicle-store', [VehicleController::class, 'store']);

/**
 * Search functionality
 * params  @make @model @year @type @price
 */
Route::post('search', [VehicleController::class, 'search']);


/**
 * Makes paginated list
 */
Route::get('makes', [MainController::class, 'makes']);
Route::get('models', [MainController::class, 'models']);
Route::get('vehicles', [MainController::class, 'vehicles']);

/**
 * @param @email
 */
Route::get('vehicles/{email}', [MainController::class, 'vehiclesByUserEmail']);

/**
 * @param @email, @password
 */
Route::post('login', [AuthController::class, 'login']);

/**
 * @param @name  @email  @phone  @role  @password
 */
Route::post('signup', [AuthController::class, 'signup']);

/** Vehicle images update/addition */
