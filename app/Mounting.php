<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $films
 */
class Mounting extends Model
{
    protected $table = 'persons';

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_mountings',
            'mounting_id',
            'film_id'
        );
    }
}
