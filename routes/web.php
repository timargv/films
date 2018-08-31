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

Route::get('/', function () {return view('welcome');});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

      Route::get('/', 'DashboardController@index');
      Route::resource('actors', 'ActorsController');
      Route::resource('films', 	'FilmsController');
      Route::resource('genres', 'GenresController');
      Route::resource('carers', 'CarersController');
      Route::delete('carers', ['as'=>'carers.dest', 'uses'=>'CarersController@dest']);
});