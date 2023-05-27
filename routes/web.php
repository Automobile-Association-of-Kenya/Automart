<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
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

Route::controller(VehicleController::class)->group(function () {
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
    Route::get('yards/{id?}', 'yards');
    Route::get('dealer-yards/{dealer_id?}', 'dealerYards');
    Route::post('yards', 'yardsCreate');
    Route::post('upload', 'uploadImages');
    Route::post('upload-update', 'uploadUpdateImages');
    Route::post('image-delete', 'imageDelete');
});

Route::post('vehicles-filter', [VehicleController::class, 'filterVehicles']);

Route::resource('users', UsersController::class);

Route::controller(UsersController::class)->group(function () {
    Route::get('list/{id?}', 'list');
    Route::get('admin-dealers/{id?}', 'dealers');
    Route::post('admin-dealers', 'dealerCreate');
    Route::get('partners/{id?}', 'partners');
    Route::post('partners', 'partnerCreate');
});

Route::get('countries', [ApplicationController::class, 'countries']);
Route::get('counties/{country_id?}', [ApplicationController::class, 'counties']);

Route::resource('settings', SettingsController::class);

Route::view('about',  'about')->name("about");
Route::view('contact','contact')->name("contact");
Route::view('privacy', 'privacy')->name('privacy');

Route::get('auth/facebook', [AuthenticatedSessionController::class, 'redirectToFacebook']);
Route::get('auth/facebook/callback', [AuthenticatedSessionController::class, 'handleFacebookCallback']);

Route::get('auth/google', [AuthenticatedSessionController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

Route::controller(SubscriptionController::class)->group(function () {
    Route::post('subscription-prop-create', 'createSubsProp');
    Route::get('get-subs-props', 'getSubsProperties');
});

Route::resource('subscriptions', SubscriptionController::class);

Route::controller(SettingsController::class)->group(function ()
{
    Route::get('mails/{id?}','mails');
    Route::post('mails', 'mailCreate');
});

Route::resource('services', ServicesController::class);
Route::get('services-get/{id?}', [ServicesController::class,'services']);

Route::resource('accounts', AccountsController::class);


Route::resource('dealers', DealerController::class);

Route::view('terms', 'terms')->name('terms');
Route::get('new-arrivals', [ApplicationController::class, 'newArrivals'])->name('new.arrivals');


require __DIR__ . '/auth.php';
