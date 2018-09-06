<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Thematic extends Model
{
    //
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function films() {
        return $this->belongsToMany(
            Film::class,
            'film_thematics',
            'thematic_id',
            'film_id'
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
        Thematic::deleted(function ($thematic) {
            $thematic->films()->detach();
        });
        $this->delete();
    }


}
