<?php

namespace App;

use Jenssegers\Date\Date;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property string image
 */
class Person extends Model
{

    use Sluggable;

    protected $table = 'persons';
    protected $fillable = ['name', 'slug'];


    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_persons',
            'person_id',
            'film_id'
        );
    }


    //-------------------
    public function carers()
    {
        return $this->belongsToMany(
            Carer::class,
            'person_carers',
            'person_id',
            'carer_id'
        );
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }


    //-------------------
    public static function add($fields)
    {
        $person = new static;
        $person->fill($fields);
        $person->save();

        return $person;
    }

    //-------------------
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    //-------------------
    public function remove()
    {
        $this->removeImage();
        Person::deleted(function ($person) {
            $person->carers()->detach();
            $person->films()->detach();
        });
        $this->delete();
    }


    //--- Получение и Добавление Профессии ---//
    //---------------------------------------//
    public function setCarers($ids)
    {
        if ($ids === null) { return; }
        $this->carers()->sync($ids);
    }    


    //-------------------
    public function getCarersTitles()
    {
        return (!$this->carers->isEmpty())
            ?   implode(', ', $this->carers->pluck('title')->all())
            :   'Нет Профессии';
    }



    //-------------------
    public function removeImage()
    {
        Storage::delete([
            'uploads/persons/original/' . $this->image,
            'uploads/persons/thumbnail/thumbnail_' . $this->image,
        ]);
    }

    //-------------------
    public function uploadImage($image)
    {
        if($image == null) { return; }
        $this->removeImage();

        $filename  = str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads/persons/original', $filename);

        $path = public_path('uploads/persons/original/' . $filename);
        $path_th = public_path('uploads/persons/thumbnail/thumbnail_' . $filename);
        Image::make($image)->widen(468)->save($path_th);
        Image::make($image->getRealPath())->save($path);
        $this->image = $filename;
        $this->save();


    }

    //-------------------
    public function getImage($value, $pre)
    {
        if($this->image == null)
        {
            return '/uploads/persons/no-image.jpg';
        }
        return "/uploads/persons/$value/$pre" . $this->image;
    }



    //------------------- DATE
    public function setDateAttribute($value)
    {
        if (strlen($value)) {
            $date = Date::createFromFormat('d/m/y', $value)->format('Y-m-d');
            $this->attributes['date'] = $date;
        }   $this->attributes['date'] = null;
    }

    public function getDateAttribute($value)
    {
        Date::setLocale('ru');
        if (strlen($value)) {
            $date = Date::createFromFormat('Y-m-d', $value)->format('d/m/y');
            return $date;
        }   return null;
    }

    public function getDate()
    {
        if (strlen($this->date)) {
            return Date::createFromFormat('d/m/y', $this->date)->format('F d, Y' );
        }   return null;
    }
 
}
