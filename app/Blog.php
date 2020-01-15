<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $guarded = ['id'];

    public function comments()
    {
        return $this->morphMany(Comment::class, 'owner')->whereConfirmed(1);
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
