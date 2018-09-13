<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_genres',
            'genre_id',
            'film_id'
        );
    }

    public function persons () {
        return $this->belongsToMany(
            Person::class,
            'person_genres',
            'genre_id',
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
        Genre::deleted(function ($genre) {
            $genre->films()->detach();
        });
        $this->delete();
    }
}
