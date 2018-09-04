<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    protected $table = 'actors';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_artists',
            'artist_id',
            'film_id'
        );
    }
}


