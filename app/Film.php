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
 * @property mixed $writers
 * @property mixed $artists
 * @property mixed $countries
 * @property mixed $mountings
 * @property mixed $musicians
 * @property mixed $years
 * @property mixed $operators
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

    public function allAct ($actrs) {
        $lists = Actor::pluck('name', 'id')->all();
        return $lists;
    }


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
            'film_directors',
            'film_id',
            'director_id'
        );
    }
    public function writers() {
        return $this->belongsToMany(
            Director::class,
            'film_writers',
            'film_id',
            'writer_id'
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
    public function artists () {
        return $this->belongsToMany(
            Artist::class,
            'film_artists',
            'film_id',
            'artist_id'
        );
    }
    public function countries () {
        return $this->belongsToMany(
            Country::class,
            'film_countries',
            'film_id',
            'country_id'
        );
    }
    public function mountings () {
        return $this->belongsToMany(
            Mounting::class,
            'film_mountings',
            'film_id',
            'mounting_id'
        );
    }
    public function musicians () {
        return $this->belongsToMany(
            Musician::class,
            'film_musicians',
            'film_id',
            'musician_id'

        );
    }
    public function operators () {
        return $this->belongsToMany(
            Operator::class,
            'film_operators',
            'film_id',
            'operator_id'
        );
    }
    public function years () {
        return $this->belongsToMany(
            Year::class,
            'film_years',
            'film_id',
            'year_id'
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
    public function setWriters($ids)
    {
        if ($ids === null) { return; }
        $this->writers()->sync($ids);
    }

    //-------------------
    public function setArtists($ids)
    {
        if ($ids === null) { return; }
        $this->artists()->sync($ids);
    }

    //-------------------
    public function setCountries($ids)
    {
        if ($ids === null) { return; }
        $this->countries()->sync($ids);
    }

    //-------------------
    public function setMountings($ids)
    {
        if ($ids === null) { return; }
        $this->mountings()->sync($ids);
    }

    //-------------------
    public function setMusicians($ids)
    {
        if ($ids === null) { return; }
        $this->musicians()->sync($ids);
    }

    //-------------------
    public function setOperators($ids)
    {
        if ($ids === null) { return; }
        $this->operators()->sync($ids);
    }

    //-------------------
    public function setYears($ids)
    {
        if ($ids === null) { return; }
        $this->years()->sync($ids);
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
