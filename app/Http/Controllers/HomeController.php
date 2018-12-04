<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Film;
use App\Person;

class HomeController extends Controller
{
    //
	public function index()
	{
		return view('index', ['title' => 'Ф']);
	}

    public function films()
    {
        $title = 'Фильмы';
        $films = Film::paginate(15);
        return view('films.index', compact('films', 'title'));
    }

    public function persons()
    {
        $title = 'Персоны';
        $persons = Person::paginate(12);
        return view('persons.index', compact('persons', 'title'));
    }
}
