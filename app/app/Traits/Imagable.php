<?php

namespace App\Traits;

trait Imagable{

    protected $baseFolder = '\images';
    protected $folder = '\products\/';

    public static function bootImagable ()
    {
        static::creating(function ($model) {
            $model->image = $model->uploadImage($model->image);
        });

        static::updating(function ($model) {

            if ($model->attributes['image'] != $model->original['image']) {
                $model->image = $model->uploadImage($model->attributes['image']);
                $model->deleteImage($model->original['image']);
            }

        });

        static::deleting(function ($model) {
            $model->deleteImage($model->image);
        });
    }

    public function uploadImage($image)
    {
        if ($image != null && !is_string($image)) {
            $imageName= $this->title."-".rand(90000, 100000) .'.'.$image->getClientOriginalExtension();
            $path = $this->baseFolder.$this->folder;
            $image->move(public_path($path), $imageName);
            
            return $path.$imageName;
        }
    }

    public function deleteImage($image)
    {
        if ($image) {
            unlink(public_path($image));
        }
    }

}

?>