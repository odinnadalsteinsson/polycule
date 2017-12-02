<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Spatie\Tags\HasTags;

class User extends Authenticatable implements HasMediaConversions
{
    use HasMediaTrait;
    use HasTags;
    use Notifiable;

    /**
     * Define media conversions for added media.
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('300px')
            ->height(300)
            ->sharpen(5)
            ->format('png')
            ->nonQueued();
        $this->addMediaConversion('40x40')
            ->fit(Manipulations::FIT_MAX, 40, 40)
            ->crop(Manipulations::CROP_CENTER, 40, 40)
            ->sharpen(5)
            ->format('png')
            ->nonQueued();
    }

    public function hasPhoto()
    {
        return (bool)$this->getMedia()->count();
    }

    public function getPhoto($type = '300px')
    {
        $photos = $this->getMedia();
        if ($photos->count()) {
            return $photos->random()->getUrl($type);
        }
        return 'https://unsplash.it/400/300?random';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
