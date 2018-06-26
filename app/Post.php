<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function book()
    {
        return $this->belongsTo(Book::class);
    }

    public function parse() {
        $parser = new \cebe\markdown\MarkdownExtra();
        return $parser->parse($this->content);
    }

    public function parsed_content() {
        return $this->parse();
    }
    
    public function count_favorites(){
        $count_favorites = \DB::table('favorites')->where('post_id', $this->id)->count();
        return $count_favorites;
    }
}
