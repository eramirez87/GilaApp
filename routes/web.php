<?php

use Illuminate\Support\Facades\Route;

Route::get('/',"\App\Http\Controllers\userController@index")->name('home');

Route::get("login","\App\Http\Controllers\loginController@index")->name('login.login');
Route::post("login","\App\Http\Controllers\loginController@authenticate")->name('login.authenticate');

//Rutas protegidas
Route::group(['middleware' => ['auth']], function(){
    Route::resource("category","\App\Http\Controllers\CategoryController");
    Route::resource("channel","\App\Http\Controllers\ChannelController");
    Route::resource("notification","\App\Http\Controllers\NotificationController");
    Route::get('logout',"\App\Http\Controllers\loginController@logout")->name('login.logout');
});
