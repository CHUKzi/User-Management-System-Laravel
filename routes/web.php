<?php

use Illuminate\Support\Facades\Route;


/* Route::get('/home', function () {
    return view('home');
}); */


//home
Route::get('/','App\Http\Controllers\Pagecontroller@indexhome');

//login
Route::get('/login','App\Http\Controllers\Pagecontroller@indexlogin');

//register
Route::get('/register','App\Http\Controllers\Pagecontroller@indexregister');

//register user
Route::post('/savedata', 'App\Http\Controllers\TaskController@store');

//login user
Route::post('/checklogin', 'App\Http\Controllers\TaskController@login');

//logout
Route::get('/logout', 'App\Http\Controllers\TaskController@logout');

//updateprofile
Route::put('/updateprofile/{id}', 'App\Http\Controllers\TaskController@update');

//delete my account
Route::get('/deletemyaccount/{id}', 'App\Http\Controllers\TaskController@deleteMyAccount');
