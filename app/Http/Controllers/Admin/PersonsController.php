<?php

namespace App\Http\Controllers\Admin;

use App\Person;
use App\Carer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PersonsController extends Controller
{

    public function index()
    {
        $persons = Person::paginate(14);
        return view('admin.persons.index', compact('persons'));
    }


    public function create()
    {
        $carers = Carer::pluck('title', 'id')->all();
        return view('admin.persons.create', compact('carers'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'
        ]);

        $person = Person::add($request->all());
        $person->uploadImage($request->file('image'));
        $person->setCarers($request->get('carers'));

        if ($request->get('action') == 'save'){
            return redirect()->back();
        } elseif ($request->get('action') == 'saveView') {
            return redirect()->route('persons.show', $person->slug);
        }
        return redirect(route('persons.index'));
    }


    public function show($slug)
    {
        $person = Person::where('slug', $slug)->firstOrFail();
        return view('admin.persons.show', compact('person'));
    }


    public function edit($id)
    {
        $person = Person::find($id);
        $carers = Carer::pluck('title', 'id');
        $selectedCarers = $person->carers->pluck('id')->all();

        return view('admin.persons.edit', compact('person', 'carers', 'selectedCarers'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'image' => 'image|required|mimes:jpeg,png,jpg,gif,svg'

        ]);

        $person = Person::find($id);
        $person->edit($request->all());
        $person->uploadImage($request->file('image'));
        $person->setCarers($request->get('carers'));


        if ($request->get('action') == 'save'){

            return redirect()->route('persons.index');

        } elseif ($request->get('action') == 'saveView') {

            return redirect()->route('persons.show', $person->slug);

        }

        return redirect()->route('persons.index');
    }


    public function destroy($id)
    {
        Person::findOrFail($id)->remove();
        return redirect()->back();
    }
}
