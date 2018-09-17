<?php

namespace App\Http\Controllers\Admin;

use App\Person;
use App\Carer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;

class PersonsController extends Controller
{

    public function index(Request $request)
    {

        $q = $request->input('q');
        $max_page = 10;
        if (empty($q)) {
            $persons = Person::paginate(25);
        } else {
            $persons = $this->search($q, $max_page);
        }
        
        return view('admin.persons.index', ['include' => 'search.table', 'persons' => $persons])->render();
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
        $carers = Carer::pluck('title', 'id');
        $selectedCarers = $person->carers->pluck('id')->all();

        return view('admin.persons.show', compact('person', 'selectedCarers', 'carers'));
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
            'image' => 'image'

        ]);

        $person = Person::find($id);
        $person->edit($request->all());
        $person->uploadImage($request->file('image'));
        $person->setCarers($request->get('carers'));


        if ($request->get('action') == 'save'){
            return redirect()->route('persons.index');
        } elseif ($request->get('action') == 'saveView') {
            return redirect()->route('persons.show', $person->id);
        }

        return redirect()->route('persons.index');
    }


    public function destroy($id)
    {
        Person::findOrFail($id)->remove();
        return redirect()->back();
    }


    public  function export() {
        $person = Person::select('id', 'name')->get();
        return Excel::create('Экспорт Year', function ($excel) use($person) {
            $excel->sheet('mysheet', function ($sheet) use ($person) {
                $sheet->fromArray($person);
            });
        })->export('xlsx');
    }


    public function search($q, $count){
        $query = mb_strtolower($q, 'UTF-8');
        $arr = explode(" ", $query); //разбивает строку на массив по разделителю
        /*
         * Для каждого элемента массива (или только для одного) добавляет в конце звездочку,
         * что позволяет включить в поиск слова с любым окончанием.
         * Длинные фразы, функция mb_substr() обрезает на 1-3 символа.
         */
        $query = [];
        foreach ($arr as $word)
        {
            $len = mb_strlen($word, 'UTF-8');
            switch (true)
            {
                case ($len <= 3):
                {
                    $query[] = $word . "*";
                    break;
                }
                case ($len > 3 && $len <= 6):
                {
                    $query[] = mb_substr($word, 0, -1, 'UTF-8') . "*";
                    break;
                }
                case ($len > 6 && $len <= 9):
                {
                    $query[] = mb_substr($word, 0, -2, 'UTF-8') . "*";
                    break;
                }
                case ($len > 9):
                {
                    $query[] = mb_substr($word, 0, -3, 'UTF-8') . "*";
                    break;
                }
                default:
                {
                    break;
                }
            }
        }
        $query = array_unique($query, SORT_STRING);
        $qQeury = implode(" ", $query); //объединяет массив в строку
        // Таблица для поиска
        $persons = Person::whereRaw("MATCH(name, name_original) AGAINST(? IN BOOLEAN MODE)", // name,email - поля, по которым нужно искать
            $qQeury)->paginate($count) ;
        return $persons;
    }
}
