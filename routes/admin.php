<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Route::prefix('admin')->group(function(){
Route::get('/admin',function(){
    return 'admin';
});
});