<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writers extends Model
{

    protected $table = 'actors';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_actors',
            'writer_id',
            'film_id'
        );
    }
}
