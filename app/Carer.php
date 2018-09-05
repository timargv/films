<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Carer extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function actors () {
        return $this->belongsToMany(
            Actor::class,
            'actor_carers',
            'carer_id',            
            'actor_id'
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
        Year::deleted(function ($carer) {
            $carer->actors()->detach();
        });
        $this->delete();
    }

}
