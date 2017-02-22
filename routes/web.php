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

Route::group(['middleware' => 'auth'], function () {
    Route::resource('subscribers', 'SubscriberController');
    Route::resource('lists', 'ListController');
    Route::post('lists/{list}/delete/{subscriber}', 'ListController@delSubscriber');
    Route::post('lists/{list}/subscriber/{subscriber}', 'ListController@addSubscriber');
    Route::get('email/setting', 'SettingController@index');
    Route::post('email/setting', 'SettingController@setting');
    Route::get('email/send', 'SendController@form');
    Route::post('email/send', 'SendController@send');
    Route::post('language', [
        'before' => 'csrf',
        'uses'   => 'LocalizationController@langSwitch',
    ]);
});




