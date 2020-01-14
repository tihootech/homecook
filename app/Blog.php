<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner')->withCount('likes')->whereConfirmed(1)->orderBy('likes_count', 'desc');
    }

    public function public_link()
    {
        return route('show_blog', urf($this->title));
    }

    public function tags_list()
    {
        return explode(",", $this->tags);
    }

    public function tags_textarea()
    {
        return str_replace(",", "\r\n", $this->tags);
    }
}
