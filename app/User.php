<?php

namespace App;

use Carbon\Carbon;
use Gravatar;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Silber\Bouncer\Database\HasRolesAndAbilities;
use Spatie\Image\Manipulations;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;
use Spatie\Tags\HasTags;

class User extends Authenticatable implements HasMediaConversions, \Illuminate\Contracts\Auth\Authenticatable
{
    use HasMediaTrait;
    use HasTags;
    use Notifiable;
    use HasRolesAndAbilities;

    /**
     * Define media conversions for added media.
     */
    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('400')
            ->height(400)
            ->sharpen(5)
            ->format('png')
            ->nonQueued();
        $this->addMediaConversion('40')
            ->fit(Manipulations::FIT_MAX, 40, 40)
            ->crop(Manipulations::CROP_CENTER, 40, 40)
            ->sharpen(5)
            ->format('png')
            ->nonQueued();
    }

    public function hasPhoto()
    {
        return (bool)($this->getMedia()->count() || !empty($this->avatar));
    }

    public function getPhoto($type = '300')
    {
        $photos = $this->getMedia();
        if ($photos->count()) {
            return $photos->last()->getUrl($type);
        }
        if (!empty($this->avatar)) {
            return $this->avatar;
        }
        return Gravatar::src($this->email, $type);
    }

    public function genders() {
        return $this->tagsWithType('gender');
    }

    public function relationshipStatuses() {
        return $this->tagsWithType('relationship-status');
    }

    public function age() {
        return Carbon::parse($this->birthdate)->age;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'about',
        'birthdate',
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
