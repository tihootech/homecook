<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }

    public function owner()
    {
        return $this->morphTo();
    }

    public function replies()
    {
        return $this->morphMany(Comment::class, 'owner')->withCount('likes')->whereConfirmed(1)->orderBy('likes_count', 'desc');
    }

    public function likes()
    {
        return $this->morphMany(Like::class, 'owner');
    }

    public function author_name()
    {
        return $this->author ? $this->author->name : null;
    }

    public function public_link()
    {
        if ($this->owner) {
            if ($this->owner_type != Comment::class) {
                return $this->owner->public_link() . '#comment-' . $this->id;
            }else {
                return $this->owner->public_link();
            }
        }else {
            return '#';
        }
    }

    public function posted_by($type)
    {
        return $type == 'guest' ? !$this->user_id : ($this->author && $this->author->type == $type);
    }
}
