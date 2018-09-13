<?php

namespace App\Http\Controllers\Admin;

use App\Person;
use App\Film;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class GenresController extends Controller
{

    public function index()
    {
        $genres = Genre::all();
//        $count = $genres->film->pluck('id')->all();
        return view('admin.genres.index', compact('genres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.genres.create');
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
            'title' => 'required'
        ]);
        Genre::create($request->all());
        return redirect(route('genres.index'));

 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $genre = Genre::where('slug', $slug)->firstOrFail();
        $films = $genre->films()->get();

        $film = Film::where('id', $genre->id)->firstOrFail();
        $persons = $film->persons()->get();

        return view('admin.genres.show', compact('genre', 'films', 'persons'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $genre = Genre::find($id);
        return view('admin.genres.edit', compact('genre'));
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
        //
        $this->validate($request, [
           'title' => 'required'
        ]);

        $genre = Genre::find($id);
        $genre->update($request->all());

        return redirect()->route('genres.index');
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
        Genre::findOrFail($id)->remove();
        return back();
    }


    public  function export() {
        $genre = Genre::select('id', 'title')->get();
        return Excel::create('Экспорт Genre', function ($excel) use($genre) {
            $excel->sheet('mysheet', function ($sheet) use ($genre) {
                $sheet->fromArray($genre);
            });
        })->export('xlsx');
    }
}
