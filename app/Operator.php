<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $films
 */
class Operator extends Model
{
    protected $table = 'persons';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_operators',
            'operator_id',
            'film_id'
        );
    }
}
