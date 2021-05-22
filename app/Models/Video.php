<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['video_thumbnail_url'];

    public function getVideoThumbnailUrlAttribute()
    {
        if ($this->video_thumbnail_path) {
            return Storage::disk('public')->url($this->video_thumbnail_path);
        }

        // TODO: change this with loading animation...
        return "https://ui-avatars.com/api/?name=" . $this->title . "&color=7F9CF5&background=EBF4FF";
    }

}
