<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\RegisteredUserController;
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


Route::get('dealer-join', [RegisteredUserController::class, 'dealerCreate']);

// Route::get('/email/verify', function () {
//     return view('auth.verify-email');
// })->middleware(['auth'])->name('verification.notice');

// Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
//     $request->fulfill();

//     return redirect('/home');
// })->middleware(['auth', 'signed'])->name('verification.verify');

// Route::post('/email/verification-notification', function (Request $request) {
//     $request->user()->sendEmailVerificationNotification();

//     return back()->with('status', 'verification-link-sent');
// })->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::resource('vehicles', VehicleController::class);

Route::controller(VehicleController::class)->group(function(){
    Route::get('makes/{make_id?}', 'makes');
    Route::post('makes', 'makeCreate');
    Route::get('models/{make_id?}', 'models');
    Route::get('model/{model_id}', 'model');
    Route::post('models', 'modelCreate');
    Route::get('types/{id?}', 'types');
    Route::post('types', 'typeCreate');
    Route::get('features/{id?}', 'features');
    Route::post('features', 'featureCreate');
    Route::get('list-vehicles', 'listVehicles');
});

Route::resource('users', UsersController::class);

Route::controller(UsersController::class)->group(function ()
{
    Route::get('list/{id?}', 'list');
    Route::get('dealers/{id?}', 'dealers');
    Route::post('dealers', 'dealerCreate');
    Route::get('partners/{id?}', 'partners');
    Route::post('partners', 'partnerCreate');
});

Route::get('countries', [ApplicationController::class, 'countries']);
Route::get('counties/{country_id}', [ApplicationController::class, 'counties']);

Route::resource('settings', SettingsController::class);

Route::get('about')->name("about");
Route::get('contact')->name("contact");
Route::get('contact')->name("dealer.create");

require __DIR__.'/auth.php';
