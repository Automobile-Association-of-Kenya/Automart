<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\dealersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome')->name('home');
// });
Route::group(['middleware' => ['auth']], function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
 });

Route::get('/', [ApplicationController::class, 'welcome'])->name('home');

Route::get('/landing',function(){
    return view('index');
});

Route::get('/SellYourCar', 'App\Http\Controllers\SellController@index')->name('sellcar');
Route::post('/SellYourCar', 'App\Http\Controllers\SellController@store')->name('savecar');
Route::post('/updateCar/{id}', 'App\Http\Controllers\SellController@update')->name('updatecar');
Route::get('/SellYourCar/Payment', 'App\Http\Controllers\SellController@pay')->name('payment');
Route::get('/Contact Us', 'App\Http\Controllers\contactController@index')->name('contact');
Route::post('/Contact Us', 'App\Http\Controllers\contactController@store')->name('store');
Route::get('/DealersPage/Dashboard', 'App\Http\Controllers\dealersController@index')->name('dealerHome');
Route::get('/BuyerPage/Dashboard', 'App\Http\Controllers\buyerController@show_reg')->name('userreg');
Route::post('/BuyerPage/Register', 'App\Http\Controllers\buyerController@user1')->name('user');
Route::get('/Available', 'App\Http\Controllers\CarController@index')->name('all_cars');
Route::post('/Available/Results', 'App\Http\Controllers\CarController@search')->name('search');
Route::get('/Available/Details{id}', 'App\Http\Controllers\CarController@show')->name('details');

Route::post('deletevehicleimage', [CarController::class, 'deleteImage']);
//admin
Route::get('/Admin@AAIT/Panel', 'App\Http\Controllers\adminController@index')->name('admin');
Route::post('/Admin@AAIT/Panel/Login', 'App\Http\Controllers\adminController@log')->name('alogin');
Route::get('/Admin@AAIT/Panel/RegAdmin{id}', 'App\Http\Controllers\adminController@reg')->name('adminReg');
Route::post('/Admin@AAIT/Panel/RegAdmin{id}', 'App\Http\Controllers\adminController@store')->name('admins');
Route::get('/Admin@AAIT/Panel/addPayment{id}', 'App\Http\Controllers\adminController@addPay')->name('add_pay');
Route::post('/Admin@AAIT/Panel/addPayment/post{id}', 'App\Http\Controllers\adminController@save')->name('save_pay');
Route::get('/Admin@AAIT/Panel/Payment/delete/{id}/admin{adm}','App\Http\Controllers\adminController@destroy')->name('del_pay');
Route::get('/Admin@AAIT/Panel/Packages{id}', 'App\Http\Controllers\adminController@package')->name('packages');
Route::get('/Admin@AAIT/Panel/Packages/Edit{id}/Admin{adm}', 'App\Http\Controllers\adminController@edit_view')->name('edit_pay');
Route::post('/Admin@AAIT/Panel/Packages/update{id}/Admin{adm}', 'App\Http\Controllers\adminController@update')->name('update_pay');
Route::get('/Admin@AAIT/Panel/Admins{id}', 'App\Http\Controllers\adminController@admins')->name('admins1');
Route::get('/Admin@AAIT/Panel/Admins/delete/{id}/admin{adm}','App\Http\Controllers\adminController@rm_admin')->name('del_admin');
// Route::get('/Admin@AAIT/Panel/Dash', 'App\Http\Controllers\adminController@dash')->name('adminReg');
//Admin Reset

/** Auth routes */
Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'doLogin'])->name('userlogin');
    Route::get('/forget-password', [AuthController::class, 'forgetPassword'])->name('forget.password');
    Route::post('/forget-password', [AuthController::class, 'forget'])->name('forget');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerUser'])->name('register');
    Route::get('/password-reset/{token}', [AuthController::class, 'reset'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'passwordReset'])->name('reset.password');
    Route::get('/email-verify/{token}', [AuthController::class, 'verify']);
});

Route::get('/getmodel/{id}','SellController@getmodel')-> name('getmodel');

Route::get('/getCarMakes',[VehicleController::class, 'getCarMakes']) -> name('getCarMakes');

Route::get('/getCarMakes', 'App\Http\Controllers\CarController@getCarMakes')->name('getCarMakes');

Route::get('/terms',function(){
    return view('terms');
});

Route::get('/getCarMakes', 'VehicleController@getCarMakes')->name('getCarMakes');


Route::post('fetch/car-models',[VehicleController::class,'getModels'])->name('carmodels.fetch');


Route::controller(DealersController::class)->group(function(){
    Route::prefix('dealer')->group(function(){
        Route::get('addcar','addCar')->name('dealer.addcar');
        Route::get('editcar/{id}','editCar')->name('dealer.editcar');
        Route::get('home','home')->name('dealer.home');
        Route::get('mycars','mycars')->name('dealer.mycars');
        Route::get('mysales','mysales')->name('dealer.mysales');
        Route::get('subscriptions','subscriptions')->name('dealer.subscriptions');
    });
});

Route::resource('application', ApplicationController::class);
Route::post('application-images', [ApplicationController::class, 'handleImages']);

Route::get('vehicle/{id}', [VehicleController::class, 'get']);

Route::resource('users', UserController::class);


Route::get('vehicles', [VehicleController::class, 'index'])->name('vehicles');
Route::get('vehicle/approve/{id}', [VehicleController::class, 'approve'])->name('vehicle.approve');
