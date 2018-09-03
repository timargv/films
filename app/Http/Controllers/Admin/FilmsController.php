<?php

namespace App\Http\Controllers\Admin;

use App\Director;
use App\Film;
use App\Genre;
use App\Actor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::paginate(15);
        return view('admin.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::pluck('title', 'id')->all();
        $actors = Actor::pluck('name', 'id')->all();
        $directors = Actor::pluck('name', 'id')->all();
        return view('admin.films.create', compact('genres', 'actors', 'directors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $this->validate($request, [
            'title' =>'required', 
        ]);

        $film = Film::add($request->all());
        $film->setGenres($request->get('genres'));
        $film->setActors($request->get('actors'));
        $film->setDirectors($request->get('directors'));

        return redirect()->route('films.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        /**/
        $film = Film::where('slug', $slug)->firstOrFail();
        $actor = Actor::where('id', $film->id)->firstOrFail();

//        $actors = 'Актер';
//        $actors = 'Режиссер';
//        $actors = 'Сценарист';
//        $actors = 'Продюсер';
//        $actors = 'Оператор';
//        $actors = 'Композитор';
//        $actors = 'Художник';
//        $actors = 'Монтажер';

        $actors = $film->actors()->get();
        $directors = $film->directors()->get();
        $genres = $film->genres()->get();

        return view('admin.films.show', compact('film', 'actors', 'genres', 'directors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);
        $actors = Actor::pluck('name', 'id')->all();
        $genres = Genre::pluck('title', 'id')->all();
        $directors = Director::pluck('name', 'id')->all();


        $selectedActors = $film->actors->pluck('id')->all();
        $selectedGenres = $film->genres->pluck('id')->all();
        $selectedDirectors = $film->directors->pluck('id')->all();

        return view('admin.films.edit', compact('film', 'actors', 'genres', 'directors', 'selectedActors', 'selectedGenres', 'selectedDirectors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $film = Film::find($id);
        $film->edit($request->all());
        $film->setActors($request->get('actors'));
        $film->setGenres($request->get('genres'));
        $film->setDirectors($request->get('directors'));

        return redirect()->route('films.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
