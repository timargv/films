<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $actors
 * @property mixed $genres
 * @property mixed $directors
 */
class Film extends Model
{

    use Sluggable;

    protected $fillable = [
        'title',
        'original_title',
        'slogan',
        // 'actor_id',
        // 'genre_id',
        // 'country_id',
        // 'year_id',
        // 'director_id',
        // 'operator_id',
        // 'composer_id',
        // 'artist_id',
        // 'mounting_id',
        'budget',
        'world_premiere',
        'age',
        'rating',
        'time',
        // 'subject_id',
        'poster_img',
        'video_field',
        'slug'
    ];

    // protected $guarded = ['id'];

    //-------------------
    public function actors()
    {
        return $this->belongsToMany(
            Actor::class,
            'film_actors',
            'film_id',
            'actor_id'
        );
    }
    public function directors() {
        return $this->belongsToMany(
            Director::class,
            'film_actors',
            'film_id',
            'director_id'
        );
    }

    public function genres()
    {
        return $this->belongsToMany(
            Genre::class,
            'film_genres',
            'film_id',
            'genre_id'
        );
    }

    //-------------------
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    //-------------------
    public static function add($fields)
    {
        $film = new static;
        $film->fill($fields);
        $film->save();

        return $film;
    }

    //-------------------
    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    //-------------------
    public function remove()
    {
        $this->delete();
    }



    //---------------------------------------//
    //---------------------------------------//
    public function setGenres($ids)
    {
        if ($ids === null) { return; }
        $this->genres()->sync($ids);
    }    

    //-------------------
    public function setActors($ids)
    {
        if ($ids === null) { return; }
        $this->actors()->sync($ids);
    }

    //-------------------
    public function setDirectors($ids)
    {
        if ($ids === null) { return; }
        $this->directors()->sync($ids);
    }


    //-------------------
    public function getActorsTitles()
    {
        return (!$this->actors->isEmpty())
            ?   implode(', ', $this->actors->pluck('name')->all())
            :   'Нет Актера';
    }


    //-------------------
    public function getGenresTitles()
    {
        return (!$this->genres->isEmpty())
            ?   implode(', ', $this->genres->pluck('title')->all())
            :   'Нет жанра';
    }


    //-------------------

}
