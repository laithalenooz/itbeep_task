<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Developer:Suheib Alabed
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', 'FormController');
Route::post('store', 'FormController@store');
Route::get('store', 'FormController@index');
Route::post('update', 'ServiceController@update');
Route::post('updateInterest', 'InterestsController@update');
//Route::post('updateInterest', 'InterestsController@show');
//
//Route::get('/sendemail','SendEmailController@index');
Route::get('/sendemail','SendEmailController@send');

//Route::resource('/', 'ServiceController');
//Route::resource('/', 'InterestsController');
