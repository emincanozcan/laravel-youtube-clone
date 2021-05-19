<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Channel extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $appends = ['channel_photo_url'];

    public function getChannelPhotoUrlAttribute()
    {
        if ($this->channel_photo_path) {
            return Storage::disk('public')->url($this->channel_photo_path);
        }

        return "https://ui-avatars.com/api/?name=" . $this->name . "&color=7F9CF5&background=EBF4FF";
    }
}
