<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoLiking extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static $LIKE = 1;
    public static $DISLIKE = -1;

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function delete()
    {
        $this->video->decrement($this->type === self::$LIKE ? 'like_count' : 'dislike_count');
        return parent::delete();
    }

    public function toggle()
    {
        $this->update(['type' => $this->type === self::$LIKE ? self::$DISLIKE : self::$LIKE]);
        $this->video->increment($this->type === self::$LIKE ? 'like_count' : 'dislike_count');
        $this->video->decrement($this->type === self::$LIKE ? 'dislike_count' : 'like_count');
    }
}
