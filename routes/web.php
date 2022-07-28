<?php

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
    /**
    * Logout Route
    */
    Route::get('/logout', 'App\Http\Controllers\logoutController@perform')->name('logout');
 });
Route::get('/', 'App\Http\Controllers\Controller@index')->name('home');
Route::get('/SellYourCar', 'App\Http\Controllers\sellController@index')->name('sellcar');
Route::post('/SellYourCar', 'App\Http\Controllers\sellController@store')->name('savecar');
Route::get('/SellYourCar/Payment', 'App\Http\Controllers\sellController@pay')->name('payment');
Route::get('/Contact Us', 'App\Http\Controllers\contactController@index')->name('contact');
Route::post('/Contact Us', 'App\Http\Controllers\contactController@store')->name('store');
Route::get('/DealersPage/Dashboard', 'App\Http\Controllers\dealersController@index')->name('dealerHome');
Route::post('/DealersPage/Dashboard', 'App\Http\Controllers\dealersController@store')->name('dealerreg');
Route::get('/LoginPage', 'App\Http\Controllers\buyerController@index')->name('login');
Route::post('/Dashboard/GariwezaUser', 'App\Http\Controllers\buyerController@login')->name('userlogin');
Route::get('/BuyerPage/Dashboard', 'App\Http\Controllers\buyerController@show_reg')->name('userreg');
Route::post('/BuyerPage/Register', 'App\Http\Controllers\buyerController@user1')->name('user');
Route::get('/Available', 'App\Http\Controllers\carController@index')->name('all_cars');
Route::post('/Available/Results', 'App\Http\Controllers\carController@search')->name('search');
Route::get('/Available/Details{id}', 'App\Http\Controllers\carController@show')->name('details');
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
Route::get('/forget-password/admin', 'App\Http\Controllers\AdminReset@show')->name('forget.admin');

Route::post('/forget-password/admin', [App\Http\Controllers\AdminReset::class, 'submitForgetPasswordForm'])->name('forget.password.post.admin'); 

Route::get('/reset-password/admin/{token}', [App\Http\Controllers\AdminReset::class, 'showResetPasswordForm'])->name('reset.password.get.admin');

Route::post('/reset-password/admin', [App\Http\Controllers\AdminReset::class, 'submitResetPasswordForm'])->name('reset.password.post.admin');

//user password reset
Route::get('/forget-password', 'App\Http\Controllers\ForgotPasswordController@show')->name('forget');

Route::post('/forget-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('/reset-password/{token}', [App\Http\Controllers\ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('/reset-password', [App\Http\Controllers\ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

