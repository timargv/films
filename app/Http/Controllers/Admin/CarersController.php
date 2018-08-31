<?php

namespace App\Http\Controllers\Admin;

use App\Carer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarersController extends Controller
{
 
    public function index()
    {
        $carers = Carer::all();
        return view('admin.carers.index', compact('carers'));
    }

 
    public function create()
    {
        return view('admin.carers.create');
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Carer::create($request->all());
        return redirect()->route('carers.index');
    }

 
    public function show($slug)
    {
        $carer = Carer::where('slug', $slug)->firstOrFail();
        return view('admin.carers.show', compact('carer'));
    }
 

    public function edit($id)
    {
        $carer = Carer::find($id);
        return view('admin.carers.edit', compact('carer'));
    }
 

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Carer::find($id)->delete();
        return back();
    }

    public function dest(Request $request)
    {
        Carer::destroy($request->carers); 
        return back();
    }


}
