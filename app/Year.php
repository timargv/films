<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed $films
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Year extends Model
{
    use Sluggable;

    protected $fillable = ['year', 'slug'];

    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_years',
            'year_id',
            'film_id'
        );
    }

    //-------------------
    public function remove()
    {
        Year::deleted(function ($year) {
            $year->films()->detach();
        });
        $this->delete();
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'year'
            ]
        ];
    }


}
