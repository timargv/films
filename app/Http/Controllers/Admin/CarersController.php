<?php

namespace App\Http\Controllers\Admin;

use App\Carer;
use App\Person;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

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
        $persons = $carer->persons()->paginate(15);

        return view('admin.carers.show', compact('carer', 'persons'));
    }
 

    public function edit($id)
    {
        $carer = Carer::find($id);
        return view('admin.carers.edit', compact('carer'));
    }
 

    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'title' => 'required'
        ]);

        $carer = Carer::find($id);
        $carer->update($request->all());
        
        return redirect()->route('carers.index');
    }

    public function destroy($id)
    {
        Carer::findOrFail($id)->remove();
        return back();
    }

    public  function export() {
        $carer = Carer::select('id', 'title')->get();
        return Excel::create('Экспорт Carer', function ($excel) use($carer) {
            $excel->sheet('mysheet', function ($sheet) use ($carer) {
                $sheet->fromArray($carer);
            });
        })->export('xlsx');
    }

}
