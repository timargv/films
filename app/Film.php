<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 */
class Film extends Model
{

    use Sluggable;

    protected $fillable = [
        'title',
        'original_title',
        'slogan',
        'actor_id',
        'genre_id',
        'country_id',
        'year_id',
        'director_id',
        'operator_id',
        'composer_id',
        'artist_id',
        'mounting_id',
        'budget',
        'world_premiere',
        'age',
        'rating',
        'time',
        'subject_id',
        'poster_img',
        'video_field'
    ];

    //-------------------


    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }


}
