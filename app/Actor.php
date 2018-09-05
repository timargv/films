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


    //-------------------
    public function films () {
        return $this->belongsToMany(
            Film::class,
            'film_actors',
            'actor_id',
            'film_id'
        );
    }


    //-------------------
    public function carers()
    {
        return $this->belongsToMany(
            Carer::class,
            'actor_carers',
            'actor_id',
            'carer_id'
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


    //-------------------
    public static function add($fields)
    {
        $actor = new static;
        $actor->fill($fields);
        $actor->save();

        return $actor;
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
        Actor::deleted(function ($actor) {
            $actor->carers()->detach();
            $actor->films()->detach();
        });
        $this->delete();
    }


    //--- Получение и Добавление Профессии ---//
    //---------------------------------------//
    public function setCarers($ids)
    {
        if ($ids === null) { return; }
        $this->carers()->sync($ids);
    }    


    //-------------------
    public function getCarersTitles()
    {
        return (!$this->carers->isEmpty())
            ?   implode(', ', $this->carers->pluck('title')->all())
            :   'Нет Профессии';
    }
 
}
