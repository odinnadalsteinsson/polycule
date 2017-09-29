<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

class User extends Authenticatable implements HasMediaConversions
{
    use HasMediaTrait;
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
    }

    public function getPhoto()
    {
        $photos = $this->getMedia();
        if ($photos->count()) {
            return $photos->random()->getUrl('300px');
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
