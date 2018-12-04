<?php

use App\Person;
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

Route::get('/', 'HomeController@index');
Route::get('/films', 'HomeController@films')->name('films.list');
Route::get('/persons', 'HomeController@persons')->name('persons.list');


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

      Route::get('/', 'DashboardController@index');
      Route::resource('persons', 'PersonsController');
      Route::resource('films', 	'FilmsController');
      Route::resource('genres', 'GenresController');
      Route::resource('countries', 'CountriesController');
      Route::resource('years', 'YearsController');
      Route::resource('carers', 'CarersController');
      Route::resource('thematics', 'ThematicsController');

      Route::get('/find-films', 'FilmsController@find')->name('films.find');
      Route::post('films/import', 'FilmsController@import')->name('films.import');
//      Route::post('films/imports', 'FilmsController@imports')->name('films.imports');


    Route::get('films-export', 'FilmsController@export')->name('films.export');
    Route::get('years-export', 'YearsController@export')->name('years.export');
    Route::get('countries-export', 'CountriesController@export')->name('countries.export');
    Route::get('persons-export', 'PersonsController@export')->name('persons.export');
    Route::get('genres-export', 'GenresController@export')->name('genres.export');
    Route::get('carers-export', 'CarersController@export')->name('carers.export');



    Route::get('/sear', function() {

        $persons = Person::searchByQuery(['match' => ['name_original' => 'Stephen Carpenter']]);

        return $persons->chunk(2);
    });

});
