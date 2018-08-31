<?php

namespace App\Http\Controllers\Admin;

use App\Actor;
use App\Carer;
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
        $carers = Carer::pluck('title', 'id')->all();
        return view('admin.actors.create', compact('carers'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $actor = Actor::add($request->all());
        $actor->setCarers($request()->get('carers'));
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
        $carers = Carer::pluck('title', 'id');
        $selectedCarers = $actor->carers->pluck('id')->all();

        return view('admin.actors.edit', compact('actor', 'carers', 'selectedCarers'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $actor = Actor::find($id);
        $actor->edit($request->all());
        $actor->setCarers($request->get('carers'));
        
        return redirect()->route('actors.index');
    }


    public function destroy($id)
    {
        Actor::find($id)->delete();
        return redirect()->back();
    }
}
