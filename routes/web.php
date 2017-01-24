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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('user/{id}', function($id){
  return 'Users'.$id;
});*/

/*Route::get('user/{name?}', function($name='john'){
  return $name;
});

Route::get('user/{name}/{id}', function($name,$id){
  return 'User name '.$name.' '.$id;
})->where(['name'=>'[a-zA-Z]+', 'id=>[0-9]+']);

Route::get('method/action',['as'=>'action', function(){
  return 'method/action';
}]);*/

Auth::routes();

Route::get('/home', 'HomeController@index');
