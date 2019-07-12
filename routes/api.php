<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//LOgin JWT

Route::post('/login', 'Auth\LoginController@authenticate');

Route::middleware('jwt')->resource('cars', 'CarController');
