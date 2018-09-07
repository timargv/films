<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Carer extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function persons () {
        return $this->belongsToMany(
            Person::class,
            'person_carers',
            'carer_id',            
            'person_id'
        );
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //-------------------
    public function remove()
    {
        Carer::deleted(function ($carer) {
            $carer->persons()->detach();
        });
        $this->delete();
    }

}
