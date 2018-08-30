<?php

namespace App\Http\Controllers\Admin;

use App\Actor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActorsController extends Controller
{

    public function index()
    {
        $actors = Actor::paginate(14);
        return view('admin.actors.index', compact('actors'));
    }


    public function create()
    {
        return view('admin.actors.create');
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        Actor::create($request->all());
        return redirect(route('actors.index'));
    }


    public function show($slug)
    {
        $actor = Actor::where('slug', $slug)->firstOrFail();
        return view('admin.actors.show', compact('actor'));
    }


    public function edit($id)
    {
        $actor = Actor::find($id);
        return view('admin.actors.edit', compact('actor'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $actor = Actor::find($id);
        $actor->update($request->all());

        return redirect()->route('actors.index');
    }


    public function destroy($id)
    {
        Actor::find($id)->delete();
        return redirect()->back();
    }
}
