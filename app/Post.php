<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function parse() {
        $parser = new \cebe\markdown\MarkdownExtra();
        return $parser->parse($this->content);
    }

    public function parsed_content() {
        return $this->parse();
    }
}
