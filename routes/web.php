<?php

// use App\Http\Controllers\ProfileController;

use App\Http\Controllers\AccountsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DealerController;
use App\Http\Controllers\FinanceController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VehicleController;
use App\Models\Visit;
use Illuminate\Support\Facades\Route;

// Visit::visit(request()->server());

Route::get('/', [ApplicationController::class, 'welcome']);

Route::get('/dashboard', [ApplicationController::class, 'dashboard'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::view('time', 'dealers.timer');


// Route::resource('vehicles', VehicleController::class);

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
Route::view('contact', 'contact')->name("contact");
Route::view('privacy', 'privacy')->name('privacy');

Route::get('auth/facebook', [AuthenticatedSessionController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('auth/facebook/callback', [AuthenticatedSessionController::class, 'handleFacebookCallback']);

Route::get('auth/google', [AuthenticatedSessionController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [AuthenticatedSessionController::class, 'handleGoogleCallback']);

Route::get('auth/twitter', [AuthenticatedSessionController::class, 'redirectToTwitter'])->name('twitter.login');
Route::get('auth/twitter/callback', [AuthenticatedSessionController::class, 'handleTwitterCallback']);

Route::controller(SubscriptionController::class)->group(function () {
    Route::post('subscription-prop-create', 'createSubsProp');
    Route::get('get-subs-props', 'getSubsProperties');
});

/** Subscriptions related routes */
Route::resource('subscriptions', SubscriptionController::class);
Route::get('subscription/{id}', [SubscriptionController::class, 'create'])->name('subscription.create');
Route::get('subscription-plans', [SubscriptionController::class, 'plans'])->name('subscription.plan');
Route::get('subscription-features', [SubscriptionController::class, 'features']);
Route::post('subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::get('/subscriptions-shortcut', [SubscriptionController::class, 'shortcut']);

Route::get('mpesaconfirm/{recc}/{checjc}', [PaymentController::class, 'mpesaconfirm']);
/** Subscriptions */

Route::controller(SettingsController::class)->group(function () {
    Route::get('mails/{id?}', 'mails');
    Route::post('mails', 'mailCreate');
    Route::get('socials/{id?}', 'socials');
    Route::post('socials', 'socialStore')->name('social.store');
});

Route::resource('services', ServicesController::class);
Route::get('services-get/{id?}', [ServicesController::class, 'services']);

Route::resource('accounts', AccountsController::class);
Route::get('accounts-get/{id?}', [AccountsController::class, 'get']);
Route::post('accounts-subscribe', [AccountsController::class, 'subscribe'])->name('accounts.subscribe');

Route::view('terms', 'terms')->name('terms');

/** Vehicles grouping routes */



// Route::get('vehicle-types',[ApplicationController::class, 'vehicleTypesWithVehicles'])->name('');
Route::get('types-with-vehicles', [ApplicationController::class, 'vehicleTypesWithVehicles']);
Route::get('makes-with-vehicles', [ApplicationController::class, 'makesWithVehicles']);
Route::get('vehicles-list', [ApplicationController::class, 'index'])->name('vehicles.list');
Route::get('models-with-vehicles', [ApplicationController::class, 'modelsWithVehicles']);
/**  */


Route::get('search', [ApplicationController::class, 'vehicleSearch']);
Route::get('vehicle-detail/{id}', [ApplicationController::class, 'vehicle'])->name('vehicle.detail');
Route::get('search', [ApplicationController::class, 'search'])->name('search');
Route::get('vehicle/{id}/{tag?}', [ApplicationController::class, 'vehicleDetails']);

require __DIR__ . '/auth.php';

Route::view('mail', 'mail');

Route::resource('quotes', QuoteController::class);
Route::resource('finances', FinanceController::class);
Route::post('tradein-store', [FinanceController::class, 'tradeInStore'])->name('tradein.store');

/** Payment routes */
Route::resource('payments', PaymentController::class);
Route::get('paymentconfirm/{checkoutid}', [PaymentController::class, 'paymentconfirm']);
Route::post('paypalcancel', [PaymentController::class, 'cancelTransaction'])->name('paypal.cancel');
Route::post('paypalsuccess', [PaymentController::class, 'successTransaction'])->name('paypal.success');
Route::post('payments-get', [PaymentController::class, 'get']);

Route::resource('reports', ReportController::class);

Route::prefix('vehicles')->group(function () {
    Route::get('show/{id}', [VehicleController::class, 'show'])->name('vehicles.show');
    Route::post('store', [VehicleController::class, 'store'])->name('vehicles.store');
    Route::get('latest', [ApplicationController::class, 'latest'])->name('latest');
    Route::get('discounts', [ApplicationController::class, 'discountedVehicles'])->name('vehicles.discounts');
    Route::get('prices/{start}/{end?}', [ApplicationController::class, 'prices'])->name('vehicle.prices');
    Route::get('type/{id}', [ApplicationController::class, 'vehicleTypes'])->name('type.vehicles');
    Route::get('model/{id}', [ApplicationController::class, 'vehicleModels'])->name('model.vehicles');
    Route::get('make/{id}', [ApplicationController::class, 'vehicleMakes'])->name('make.vehicles');
    // Route::get('new', [ApplicationController::class, 'newArrivals'])->name('new.arrivals');
    Route::get('new', [ApplicationController::class, 'newVehicles'])->name('new');
    Route::get('highend', [ApplicationController::class, 'highend']);

});


Route::get('vehicles-buy/{no}', [ApplicationController::class, 'buy'])->name('buy');
Route::get('vehicle-loan/{no}', [ApplicationController::class, 'loan'])->name('loan');
Route::post('loan-application', [ApplicationController::class, 'apply']);
Route::post('purchase', [ApplicationController::class, 'purchase'])->name('purchase');
Route::get('like/{id}', [ApplicationController::class, 'like']);
Route::get('view/{id}', [ApplicationController::class, 'view']);
Route::get('whatsapp/{id}', [ApplicationController::class, 'whatsapp']);

/** Loan Routes */
Route::get('/partner-loanproducts/{partner_id}', [PartnerController::class, 'partnerloanproducts']);
Route::get('loanproducts/{id?}', [PartnerController::class, 'getloanproducts']);


Route::prefix('/partner')->group(function () {
    Route::get('/', [PartnerController::class, 'index'])->name('partner.index');
    Route::get('loans', [PartnerController::class, 'loans'])->name('partner.loans');
    Route::post('store', [PartnerController::class, 'store'])->name('partner.store');
    Route::post('saveloanproduct', [PartnerController::class, 'saveloanproduct'])->name('partner.saveloanproduct');
    Route::get('loanproducts', [PartnerController::class, 'loanproducts']);
});

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('vehicles', [AdminController::class, 'vehicles'])->name('admin.vehicles');
    Route::get('users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('accounts', [AdminController::class, 'accounts'])->name('admin.accounts');
    Route::get('requests', [AdminController::class, 'requests'])->name('admin.requests');
    Route::get('settings', [SettingsController::class, 'index'])->name('admin.settings');
    Route::get('reports', [AdminController::class, 'reports'])->name('admin.reports');
    Route::get('customers', [UsersController::class, 'customers']);
});

Route::get('dealers-get', [DealerController::class, 'getDealers']);

// dd(auth()->user());
Route::middleware('dealer')->prefix('dealer')->group(function () {
    Route::get('/', [DealerController::class, 'index'])->name('dealer.index');
    Route::get('subscription', [DealerController::class, 'subscription']);
    Route::get('vehicles', [DealerController::class, 'vehicles'])->name('dealer.vehicles');
    Route::get('requests', [DealerController::class, 'requests'])->name('dealer.requests');
    Route::post('store', [DealerController::class, 'store'])->name('dealer.store');
    Route::get('purchase/approve/{id}', [DealerController::class, 'purchaseapprove'])->name('dealer.puchase.approve');
    Route::post('purchase/decline', [DealerController::class, 'purchasedecline'])->name('dealer.purchase.decline');
});

Route::post('loan-request-reply', [SettingsController::class,'loanMessage'])->name('loan.message');
Route::post('quote-request-reply', [SettingsController::class, 'quoteMessage'])->name('quote.message');
Route::post('tradein-request-reply', [SettingsController::class, 'tradeinMessage'])->name('tradein.message');

Route::get('webtraffic/{date}', [SettingsController::class, 'webtraffic']);

Route::get('processvehicles', [ServicesController::class, 'processvehicles']);
