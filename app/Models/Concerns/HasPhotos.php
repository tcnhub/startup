<?php

namespace App\Models\Concerns;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Support\Facades\Storage;

trait HasPhotos
{
    public function photos(): MorphMany
    {
        return $this->morphMany(Photo::class, 'photoable')->orderBy('order');
    }

    public function posts(): MorphMany
    {
        return $this->morphMany(\App\Models\Post::class, 'author');
    }

    protected static function bootHasPhotos(): void
    {
        static::deleting(function ($model) {
            $model->photos()->each(function ($photo) {
                Storage::disk('public')->delete($photo->path);
                $photo->delete();
            });
            if ($model->profile_photo) {
                Storage::disk('public')->delete($model->profile_photo);
            }
        });
    }
}
