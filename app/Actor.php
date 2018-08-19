<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;


/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Actor extends Model
{

    use Sluggable;

    protected $fillable = ['name', 'slug'];

    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_actors',
            'actor_id',
            'film_id'
        );
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
}
