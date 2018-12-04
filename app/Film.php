<?php

namespace App;

use Jenssegers\Date\Date;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @property \Carbon\Carbon $created_at
 * @property int $id
 * @property \Carbon\Carbon $updated_at
 * @property mixed $persons
 * @property mixed $genres
 * @property mixed $directors
 * @property mixed $writers
 * @property mixed $artists
 * @property mixed $countries
 * @property mixed $mountings
 * @property mixed $musicians
 * @property mixed $years
 * @property mixed $operators
 * @property mixed $relateds
 * @property mixed $thematics
 */
class Film extends Model
{

    use Sluggable;

    protected $table = 'films';

    protected $fillable = [
        'title',
        'original_title',
        'slogan',
        'budget',
        'date',
        'age',
        'rating',
        'time',
      //  'image',
        'sh_description',
        'description',
        'video_field',
        'trailer_field',
        'slug'
    ];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        Film::deleted(function ($film) {
            $film->genres()->detach();
            $film->persons()->detach();
            $film->directors()->detach();
            $film->writers()->detach();
            $film->artists()->detach();
            $film->countries()->detach();
            $film->mountings()->detach();
            $film->musicians()->detach();
            $film->operators()->detach();
            $film->years()->detach();
            $film->relateds()->detach();
            $film->thematics()->detach();

            $film->removePoster();
        });
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

    // protected $guarded = ['id'];

    public function allPers ($person) {
        // $person = Person::pluck('name', 'id')->all();
        $person = Person::get();
        return $person;
    }



    //------------------- relateds films
    public function relateds() {
        return $this->belongsToMany(
            Film::class,
            'film_relateds',
            'film_id',
            'related_id'
        );
    }

    //-------------------
    public function Persons()
    {
        return $this->belongsToMany(
            Person::class,
            'film_persons',
            'film_id',
            'person_id'
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
    public function thematics () {
        return $this->belongsToMany(
            Thematic::class,
            'film_thematics',
            'film_id',
            'thematic_id'
        );
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
//    public function remove()
//    {
//        Film::deleted(function ($film) {
//
//            $film->genres()->detach();
//            $film->persons()->detach();
//            $film->directors()->detach();
//            $film->writers()->detach();
//            $film->artists()->detach();
//            $film->countries()->detach();
//            $film->mountings()->detach();
//            $film->musicians()->detach();
//            $film->operators()->detach();
//            $film->years()->detach();
//            $film->relateds()->detach();
//            $film->thematics()->detach();
//
//        });
//        $this->removePoster();
//        $this->delete();
//    }





    //---------------------------------------//
    //---------------------------------------//
    public function setGenres($ids)
    {
        if ($ids === null) { return; }
        $this->genres()->sync($ids);
    }    

    //-------------------
    public function setPersons($ids)
    {
        if ($ids === null) { return; }
        $this->persons()->sync($ids);
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
    public function setRelateds($ids)
    {
        if ($ids === null) { return; }
        $this->relateds()->sync($ids);
    }

    //-------------------
    public function setThematics($ids)
    {
        if ($ids === null) { return; }
        $this->thematics()->sync($ids);
    }



    //-------------------
    public function getPersonsTitles()
    {
        return (!$this->persons->isEmpty())
            ?   implode(', ', $this->persons->pluck('name')->all())
            :   'Нет Актера';
    }


    //-------------------
    public function getGenresTitles()
    {
        return (!$this->genres->isEmpty())
            ?   implode(', ', $this->genres->pluck('title')->all())
            :   'Нет жанра';
    }


    //------------------- DATE
    public function setDateAttribute($value)
    {
        if (strlen($value)) {
            $date = Date::createFromFormat('d/m/y', $value)->format('Y-m-d');
            $this->attributes['date'] = $date;
        }   $this->attributes['date'] = null;
    }

    public function getDateAttribute($value)
    {
        Date::setLocale('ru');
        if (strlen($value)) {
            $date = Date::createFromFormat('Y-m-d', $value)->format('d/m/y');
            return $date;
        }   return null;
    }

    public function getDate()
    {
        if (strlen($this->date)) {
            return Date::createFromFormat('d/m/y', $this->date)->format('F d, Y' );
        }   return null;
    }


    //-------------------
    public function removeImage()
    {
        Storage::delete([
            'uploads/films/original/' . $this->image,
            'uploads/films/thumbnail/thumbnail_' . $this->image,
        ]);
    }

    //-------------------
    public function uploadImage($image)
    {
        if($image == null) { return; }
        $this->removeImage();

        $filename  = str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads/persons/original', $filename);

        $path = public_path('uploads/films/original/' . $filename);
        $path_th = public_path('uploads/films/thumbnail/thumbnail_' . $filename);
        Image::make($image)->widen(468)->save($path_th);
        Image::make($image->getRealPath())->save($path);
        $this->image = $filename;
        $this->save();


    }

    //-------------------
    public function getImage($value, $pre)
    {
        if($this->image == null)
        {
            return '/uploads/films/no-image.jpg';
        }
        return "/uploads/films/$value/$pre" . $this->image;
    }

}
