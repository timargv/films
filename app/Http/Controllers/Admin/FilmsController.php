<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Film;
use App\Genre;
//use App\Person;
use App\Person;
use App\Related;
use App\Thematic;
use App\Year;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use Rap2hpoutre\FastExcel\FastExcel;

class FilmsController extends Controller
{


    public function index()
    {
        $films = Film::paginate(15);
//        $films = Film::orderBy('id', 'desc')->paginate(15);
//        $films = DB::table('films')->orderBy('id', 'asc')->paginate(15);
        return view('admin.films.index', compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $genres     = Genre::pluck('title', 'id')->all();
        $years      = Year::pluck('year', 'id')->all();
        $countries  = Country::pluck('country', 'id')->all();
        $relateds   = Related::pluck('title', 'id')->all();
        $thematics  = Thematic::pluck('title', 'id')->all();

        $filmis = new Film();
        $persons = $filmis->allPers($filmis);



        return view('admin.films.create',  compact('genres', 'persons', 'countries', 'relateds', 'years', 'thematics'));
    }

    public function find(Request $request)
    {
         $data = [];

        if($request->has('q')){
            $search = $request->q;
            $data = DB::table("persons")
                    ->select("id","name")
                    ->where('name','LIKE',"%$search%")
                    ->get();
        }

        return response()->json($data);
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
        ]);

        $film = Film::add($request->all());
        $film->uploadPoster($request->file('image'));
        $film->setGenres($request->get('genres'));
        $film->setPersons($request->get('persons'));
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
//        $person = Person::where('id', $film->id)->firstOrFail();
//        $persons = 'Актер';
//        $persons = 'Режиссер';
//        $persons = 'Сценарист';
//        $persons = 'Продюсер';
//        $persons = 'Оператор';
//        $persons = 'Композитор';
//        $persons = 'Художник';
//        $persons = 'Монтажер';

        $persons    = $film->persons()->get();
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

        return view('admin.films.show', compact('film',  'persons', 'genres', 'directors', 'writers', 'artists','countries', 'mountings', 'musicians', 'operators', 'years', 'relateds', 'thematics'));
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
        $persons = $filmis->allPers($filmis);

        $selectedGenres     = $film->genres->pluck('id')->all();
        $selectedPersons    = $film->persons->pluck('id')->all();
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
            'film', 'persons', 'genres',  'countries',   'years', 'relateds', 'thematics',
            'selectedGenres',
            'selectedPersons',
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
            'title' => 'required',
        ]);

        $film = Film::find($id);
        $film->edit($request->all());
        $film->setGenres($request->get('genres'));
        $film->setPersons($request->get('persons'));
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


        $film->uploadImage($request->file('image'));

//        dd($request->all());

        if ($request->get('action') == 'save'){

            return redirect()->back();

        } elseif ($request->get('action') == 'saveAdd') {

            return redirect()->route('films.create');

//        } elseif ($request->get('action') == 'del') {
//
//            $film->uploadPoster($film->image);
//            return redirect()->route('films.edit', $film->id);

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
        Film::findOrFail($id)->delete();
        return redirect()->back();
    }



    public function import(Request $request) {
        $this->validate($request, [
            'file' => 'required',
        ]);
        $path = $request->file('file')->getRealPath();
//        Excel::filter('chunk')->load($path)->chunk(250, function($results)
//        {
//            foreach ($results as $key => $value) {
//                $attributes = $value->only('title', 'image', 'time', 'description')->toArray();
//                Film::create($attributes);
//            }
//        });

        $collection = (new FastExcel)->import($path);


            $collection->filter()->each(function($item) {
                Film::create([
                    'title' => $item['title'],
                ]);
            });

        return redirect()->route('films.index');
    }

    public  function export() {
        $films = Film::select('id', 'title')->get();
        return Excel::create('Экспорт Фильмы', function ($excel) use($films) {
            $excel->sheet('mysheet', function ($sheet) use ($films) {
                $sheet->fromArray($films);
            });
        })->export('xlsx');
    }

}
