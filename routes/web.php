<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', 'MainController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::get('/model', 'HomeController@model');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('subscribers', 'SubscriberController');
    Route::resource('lists', 'ListController');
});

Route::post('language', [
    'before' => 'csrf',
    //'as'     => 'language-chooser',
    'uses'   => 'LocalizationController@langSwitch',
]);


