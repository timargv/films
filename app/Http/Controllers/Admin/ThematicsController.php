<?php

namespace App\Http\Controllers\Admin;

use App\Thematic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ThematicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $thematics = Thematic::paginate(15);
        return view('admin.thematics.index', compact('thematics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.thematics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
           'title' => 'required'
        ]);

        $thematic = Thematic::add($request->all());
        $thematic->uploadImage($request->file('image'));
        return redirect()->route('thematics.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $thematic = Thematic::where('slug', $slug)->firstOrFail();
        $films = $thematic->films()->get();

        return view('admin.thematics.show', compact('thematic', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $thematic = Thematic::find($id);
//        dd($thematic);
        return view('admin.thematics.edit', compact('thematic'));
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
            'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $thematic = Thematic::find($id);
        $thematic->edit($request->all());

        $thematic->uploadImage($request->file('image'));

//        if ($request->get('action') == 'save'){
            return redirect()->back();
//        }
//        return redirect()->route('thematics.index');
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
        Thematic::findOrFail($id)->remove();
        return redirect()->back();
    }
}
