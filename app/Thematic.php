<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

/**
 * @property string image
 */
class Thematic extends Model
{
    //
    use Sluggable;

    protected $fillable = ['title', 'slug'];

    public function films() {
        return $this->belongsToMany(
            Film::class,
            'film_thematics',
            'thematic_id',
            'film_id'
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
        $thematic = new static;
        $thematic->fill($fields);
        $thematic->save();

        return $thematic;
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
        Thematic::deleted(function ($thematic) {
            $thematic->films()->detach();
        });
        $this->delete();
    }

//    //-------------------
//    public function removeImage()
//    {
//        $this->removeImage();
//        Storage::delete([
//            'uploads/thematics/original/' . $this->image,
//            'uploads/thematics/thumbnail/thumbnail_' . $this->image,
//        ]);
//    }

    //-------------------
    public function uploadImage($image)
    {
//        if($image == null) { return; }
//        $this->removeImage();
//
//        $filename  = str_random(10) . '.' . $image->extension();
////        $image->storeAs('uploads/persons/original', $filename);
//
//        $path = public_path('uploads/thematics/original/' . $filename);
//        $path_th = public_path('uploads/thematics/thumbnail/thumbnail_' . $filename);
//        Image::make($image)->widen(468)->save($path);
//        Image::make($image->getRealPath())->save($path_th);
//        $this->image = $filename;
//        $this->save();

        if($image == null) { return; }

        $this->removeImage();
        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads/thematics/original', $filename);
        $this->image = $filename;
        $this->save();
    }

//    //-------------------
//    public function getImage($value, $pre)
//    {
//        if($this->image == null)
//        {
//            return '/uploads/thematics/no-image.jpg';
//        }
//        return "/uploads/thematics/$value/$pre" . $this->image;
//    }



    //-------------------
    public function removeImage()
    {
        if($this->image != null)
        {
            Storage::delete('uploads/thematics/' . $this->image);
        }
    }

    //-------------------
//    public function uploadImage($image)
//    {
//        if($image == null) { return; }
//
//        $this->removeImage();
//        $filename = str_random(10) . '.' . $image->extension();
//        $image->storeAs('uploads', $filename);
//        $this->image = $filename;
//        $this->save();
//    }

    //-------------------
//    public function getImage()
//    {
//        if($this->image == null)
//        {
//            return '/uploads/thematics/no-image.jpg';
//        }
//
//        return "/uploads/thematics/" . $this->image;
//
//    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }

        $this->removeAvatar();

        $filename = str_random(10) . '.' . $image->extension();
        $image->storeAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->image!= null)
        {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/' . $this->image;
    }

}
