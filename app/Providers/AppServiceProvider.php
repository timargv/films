<?php

namespace App\Providers;

use App\Person;
use App\Film;
use App\Genre;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public function boot()
    {
        //
        view()->composer('admin._sidebar', function($view){
            $view->with('countFilms', Film::all()->count());
            $view->with('countPersons', count(Person::all()));
        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
