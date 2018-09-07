<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'persons';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_directors',
            'director_id',
            'film_id'
        );
    }
}
