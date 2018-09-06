<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Film;
use App\Genre;
//use App\Actor;
use App\Related;
use App\Thematic;
use App\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class FilmsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::orderBy('id', 'desc')->paginate(15);
//        $films = DB::table('films')->orderBy('id', 'asc')->paginate(15);
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
        $relateds   = Related::pluck('title', 'id')->all();
        $thematics   = Thematic::pluck('title', 'id')->all();

        $filmis = new Film();
        $actors = $filmis->allAct($filmis);

        return view('admin.films.create', compact('genres', 'actors', 'countries', 'relateds', 'years', 'thematics'));
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
            'title' => 'required',
            'date'  => 'nullable'
        ]);

        $film = Film::add($request->all());
        $film->uploadImage($request->file('poster_img'));
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
        $film->setRelateds($request->get('relateds'));
        $film->setThematics($request->get('thematics'));

        if ($request->get('action') == 'save'){
            return redirect()->back();
        } elseif ($request->get('action') == 'saveAdd') {
            return redirect()->route('films.create');
        }

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
        $relateds   = $film->relateds()->get();
        $thematics  = $film->thematics()->get();

        return view('admin.films.show', compact('film',  'actors', 'genres', 'directors', 'writers', 'artists','countries', 'mountings', 'musicians', 'operators', 'years', 'relateds', 'thematics'));
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
        $relateds   = Related::pluck('title', 'id')->all();
        $thematics  = Thematic::pluck('title', 'id')->all();


        $filmis = new Film();
        $actors = $filmis->allAct($filmis);

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
        $selectedRelateds   = $film->relateds->pluck('id')->all();
        $selectedThematics  = $film->thematics->pluck('id')->all();


        return view('admin.films.edit', compact(
            'film', 'actors', 'genres',  'countries',   'years', 'relateds', 'thematics',
            'selectedGenres',
            'selectedActors',
            'selectedDirectors',
            'selectedWriters',
            'selectedArtists',
            'selectedCountries',
            'selectedMountings',
            'selectedMusicians',
            'selectedOperators',
            'selectedYears',
            'selectedRelateds',
            'selectedThematics'
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
        $film->uploadImage($request->file('poster_img'));
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
        $film->setRelateds($request->get('relateds'));
        $film->setThematics($request->get('thematics'));

        if ($request->get('action') == 'save'){
            return redirect()->back();
        } elseif ($request->get('action') == 'saveAdd') {
            return redirect()->route('films.create');
        } elseif ($request->get('action') == 'saveView') {
            return redirect()->route('films.show', $film->slug);
        }
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
        Film::findOrFail($id)->remove();
        return redirect()->back();
    }
}
