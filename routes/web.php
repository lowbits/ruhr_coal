<?php

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('api/v1/')->group(function() {
    Route::resource('tour', 'TourController');
    Route::resource('activity', 'ActivityController');
    Route::resource('gactivity', 'GactivityController');
    Route::post('gactivity/participate/{gactivity}', 'GactivityController@participate');
    Route::post('gactivity/unparticipate/{gactivity}', 'GactivityController@unparticipate');
    Route::resource('location', 'LocationController');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
});