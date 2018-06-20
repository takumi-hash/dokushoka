<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
    
    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('type')->withTimestamps();
    }

    public function want_books()
    {
        return $this->books()->where('type', 'want');
    }

    public function want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "want"
            $this->books()->attach($itemId, ['type' => 'want']);
            return true;
        }
    }

    public function dont_want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // remove "want"
            \DB::delete("DELETE FROM book_user WHERE user_id = ? AND book_id = ? AND type = 'want'", [\Auth::user()->id, $itemId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_wanting($itemIdOrCode)
    {
        if (strlen($itemIdOrCode)<10) {
            $item_id_exists = $this->want_books()->where('book_id', $itemIdOrCode)->exists();
            return $item_id_exists;
        } else {
            $item_code_exists = $this->want_books()->where('isbn', $itemIdOrCode)->exists();
            return $item_code_exists;
        }
    }
    
    public function have_books()
    {
        return $this->books()->where('type', 'have');
    }

    public function have($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_having($itemId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "have"
            $this->books()->attach($itemId, ['type' => 'have']);
            return true;
        }
    }

    public function dont_have($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_having($itemId);

        if ($exist) {
            // remove "want"
            \DB::delete("DELETE FROM book_user WHERE user_id = ? AND book_id = ? AND type = 'have'", [\Auth::user()->id, $itemId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_having($itemIdOrCode)
    {
        if (strlen($itemIdOrCode)<10) {
            $item_id_exists = $this->have_books()->where('book_id', $itemIdOrCode)->exists();
            return $item_id_exists;
        } else {
            $item_code_exists = $this->have_books()->where('isbn', $itemIdOrCode)->exists();
            return $item_code_exists;
        }
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
