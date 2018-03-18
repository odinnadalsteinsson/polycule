<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    public function users()
    {
        return $this->belongsTo('users');
    }

    public function toUsers()
    {
        return $this->belongsTo('users', 'to_user_id');
    }

    public function comments()
    {
        return $this->morphMany('comments', 'commentable');
    }

    public function tags()
    {
        return $this->morphToMany('tags', 'taggable');
    }

}
