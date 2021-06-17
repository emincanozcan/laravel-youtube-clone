<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function scopeNotReply($query)
    {
        return $query->where('comment_id', null);
    }

    public function replies()
    {
        return $this->hasMany(Comment::class);
    }
}
