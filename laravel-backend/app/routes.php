<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/books', array('before' => 'auth', function() {
  return Response::json(array(
    array('title' => 'Great Expectations', 'author' => 'Dickens'),
    array('title' => 'Foundation', 'author' => 'Asimov'),
    array('title' => 'Treasure Island', 'author' => 'Stephenson')
  ));

  // return Response::json(array('flash' => 'Session expired'), 401);
}));

Route::get('/auth/csrf_token', function() {
  return Response::json(array('csrf_token' => csrf_token()));
});

Route::post('/auth/login', array('before' => 'csrf_json', 'uses' => 'AuthController@login'));
Route::get('/auth/logout', 'AuthController@logout');
Route::get('/auth/status', 'AuthController@status');
Route::get('/auth/secrets','AuthController@secrets');

Route::get('/', function(){
	return "Welcome to API!";
});