<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Related extends Model
{
    protected $table = 'films';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_relateds',
            'related_id',
            'film_id'
        );
    }
}
