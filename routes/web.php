<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehicleController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ApplicationController::class, 'welcome']);

Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('status', 'verification-link-sent');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::resource('vehicles', VehicleController::class);

Route::controller(VehicleController::class)->group(function(){
    Route::get('makes', 'makes');
    Route::post('makes', 'makeCreate');
    Route::get('models/{model_id?}', 'models');
    Route::post('models', 'modelCreate');
    Route::get('types', 'types');
    Route::get('features', 'features');
    Route::post('features', 'featuresCreate');
    Route::get('list-vehicles', 'listVehicles');
});

Route::resource('vehicles', VehicleController::class);

Route::get('countries', [ApplicationController::class, 'countries']);
Route::get('counties/{country_id}', [ApplicationController::class, 'counties']);

Route::resource('users', UsersController::class);


Route::resource('settings', SettingsController::class);

require __DIR__.'/auth.php';
