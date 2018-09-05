<?php

namespace App\Http\Controllers\Admin;

use App\Actor;
use App\Film;
use App\Genre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $actors = $film->actors()->get();

        return view('admin.genres.show', compact('genre', 'films', 'actors'));
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
}
