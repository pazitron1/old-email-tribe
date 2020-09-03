<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages.welcome');
})->name('welcome');
Route::get('thank-you', function() {
    return view('pages.thank-you');
});

Route::post('intent/update', 'JobController@updateIntent');///Needs moving to it's own controller

Auth::routes();

Route::get('home', 'HomeController@index')->name('home');

//Jobs
Route::get('jobs/{access_token}/edit', 'JobController@edit');
Route::get('jobs/{category}/{job}', 'JobController@show')->name('jobs.show');
Route::get('jobs/create', 'JobController@create')->name('jobs.create');
Route::post('jobs', 'JobController@store')->name('jobs.store');
Route::get('jobs/{category}', 'JobController@index')->name('jobs.category.index');

//Categories
Route::get('/categories', 'CategoryController@index');

//Admin
Route::group(['prefix' => 'manage'], function() {
    Route::get('/', function() {
        return view('pages.manage.dashboard');
    })->name('manage.dashboard');;

    //Categories Admin
    Route::get('categories', function() {
        return view('pages.manage.categories.index');
    })->name('manage.categories.index');
    Route::delete('categories/{category}', 'CategoryController@destroy');
    Route::put('categories/{category}', 'CategoryController@update');

    //Jobs Admin
    Route::get('jobs', 'ManageJobsController@index')->name('manage.jobs.index');
    Route::get('jobs/{job}/edit', 'ManageJobsController@edit')->name('manage.jobs.edit');
    Route::put('jobs/{job}', 'ManageJobsController@update')->name('manage.jobs.update');
    Route::delete('jobs/{job}', 'ManageJobsController@destroy');

    //Job Status
    Route::put('jobs/status/{job}', 'JobStatusController@update')->name('manage.jobs.status');
});


// Route::resource('job', 'JobController')->only('index', 'show');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
