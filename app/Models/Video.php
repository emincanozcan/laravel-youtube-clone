<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['video_thumbnail_url', 'public_video_url'];

    public function getVideoThumbnailUrlAttribute()
    {
        if ($this->video_thumbnail_path) {
            return Storage::disk('public')->url($this->video_thumbnail_path);
        }

        // TODO: change this with loading animation...
        return "https://ui-avatars.com/api/?name=" . $this->title . "&color=7F9CF5&background=EBF4FF";
    }

    public function getPublicVideoUrlAttribute()
    {
        if ($this->public_video_path) {
            return Storage::disk('public')->url($this->public_video_path);
        }

        // TODO: think about it...
        return "";
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
