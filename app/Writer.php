<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    protected $table = 'actors';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_writers',
            'writer_id',
            'film_id'
        );
    }
}
