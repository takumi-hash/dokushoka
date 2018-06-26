<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = ['isbn', 'title', 'author','publisher', 'caption','url', 'image_url'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }
    
    public function posts()
    {
        return $this->hasMany(Post::class)->paginate(20);
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
    public function have_users()
    {
        return $this->users()->where('type', 'have');
    }
}