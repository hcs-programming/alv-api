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

Route::get('/students/{class}', 'StudentController@allInClass');
Route::post('/students/{class}', 'StudentController@saveClass');
Route::get('/today', 'StudentController@todaysEntries');
