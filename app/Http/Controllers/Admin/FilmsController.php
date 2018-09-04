<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Film;
use App\Genre;
use App\Actor;
use App\Year;
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
        $genres     = Genre::pluck('title', 'id')->all();
        $years      = Year::pluck('year', 'id')->all();
        $countries  = Country::pluck('country', 'id')->all();

        $all_actor  = Actor::pluck('name', 'id')->all();

        $actors     = $all_actor;
        $directors  = $all_actor;
        $artists    = $all_actor;
        $mountings  = $all_actor;
        $musicians  = $all_actor;
        $operators  = $all_actor;
        $writers    = $all_actor;

        return view('admin.films.create', compact('genres', 'actors', 'directors', 'writers', 'artists','countries', 'mountings', 'musicians', 'operators', 'years'));
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
        $film->setWriters($request->get('writers'));
        $film->setArtists($request->get('artists'));
        $film->setCountries($request->get('countries'));
        $film->setMountings($request->get('mountings'));
        $film->setMusicians($request->get('musicians'));
        $film->setOperators($request->get('operators'));
        $film->setYears($request->get('years'));

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
//        $actor = Actor::where('id', $film->id)->firstOrFail();
//        $actors = 'Актер';
//        $actors = 'Режиссер';
//        $actors = 'Сценарист';
//        $actors = 'Продюсер';
//        $actors = 'Оператор';
//        $actors = 'Композитор';
//        $actors = 'Художник';
//        $actors = 'Монтажер';

        $actors     = $film->actors()->get();
        $directors  = $film->directors()->get();
        $genres     = $film->genres()->get();
        $artists    = $film->artists()->get();
        $countries  = $film->countries()->get();
        $mountings  = $film->mountings()->get();
        $musicians  = $film->musicians()->get();
        $operators  = $film->operators()->get();
        $years      = $film->years()->get();
        $writers    = $film->writers()->get();

        return view('admin.films.show', compact('film', 'actors', 'genres', 'directors', 'writers', 'artists','countries', 'mountings', 'musicians', 'operators', 'years'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $film       = Film::find($id);
        $genres     = Genre::pluck('title', 'id')->all();
        $years      = Year::pluck('year', 'id')->all();
        $countries  = Country::pluck('country', 'id')->all();

        $filmis = new Film();
        $actors = $filmis->allAct($filmis);

//        $all_actor[]  = Actor::pluck('name', 'id')->all();

        $selectedGenres     = $film->genres->pluck('id')->all();
        $selectedActors     = $film->actors->pluck('id')->all();
        $selectedDirectors  = $film->directors->pluck('id')->all();
        $selectedWriters    = $film->writers->pluck('id')->all();
        $selectedArtists    = $film->artists->pluck('id')->all();
        $selectedCountries  = $film->countries->pluck('id')->all();
        $selectedMountings  = $film->mountings->pluck('id')->all();
        $selectedMusicians  = $film->musicians->pluck('id')->all();
        $selectedOperators  = $film->operators->pluck('id')->all();
        $selectedYears      = $film->years->pluck('id')->all();


        return view('admin.films.edit', compact(
            'film', 'actors', 'genres',  'countries',   'years',
            'selectedGenres',
            'selectedActors',
            'selectedDirectors',
            'selectedWriters',
            'selectedArtists',
            'selectedCountries',
            'selectedMountings',
            'selectedMusicians',
            'selectedOperators',
            'selectedYears'
        ));
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
        $film->setGenres($request->get('genres'));
        $film->setActors($request->get('actors'));
        $film->setDirectors($request->get('directors'));
        $film->setWriters($request->get('writers'));
        $film->setArtists($request->get('artists'));
        $film->setCountries($request->get('countrs'));
        $film->setMountings($request->get('mountings'));
        $film->setMusicians($request->get('musicians'));
        $film->setOperators($request->get('operators'));
        $film->setYears($request->get('years'));

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
