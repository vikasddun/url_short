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


//Default Route for displaying the homepage & form
Route::get('/', 'HomeController@showWelcome');

//Route for URL-form submission
Route::post('generateHash', 'HomeController@generateHash');

//Wildcard Route to catch all the request except those covered in above listed routes
Route::any('{path?}', 'HomeController@goToUrl')->where('path', '.+');