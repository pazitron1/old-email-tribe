<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('all-email-jobs', 'JobController@index');
Route::get('jobs/{category}', 'JobController@index');
Route::put('jobs/{category}/{access_token}', 'JobController@update');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
