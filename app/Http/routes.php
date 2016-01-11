<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'tender'], function(){
    Route::get('deleted', 'TenderController@deleted');
    Route::get('restore/{tender}', 'TenderController@restore');
    Route::get('delete/{tender}', 'TenderController@delete');
    Route::get('filter/{filter}', 'TenderController@filter');
});


Route::resource('tender', 'TenderController');