<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $films
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $created_at
 * @property int $id
 */
class Country extends Model
{
    use Sluggable;

    protected $fillable = ['country', 'slug'];

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_countries',
            'country_id',
            'film_id'
        );
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'country'
            ]
        ];
    }
}
