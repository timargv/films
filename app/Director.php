<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    protected $table = 'actors';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_actors',
            'director_id',
            'film_id'
        );
    }
}
