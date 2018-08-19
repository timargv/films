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
        Actor::create($request->all());
        return redirect(route('actors.index'));
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        Actor::find($id)->delete();
        return redirect()->back();
    }
}
