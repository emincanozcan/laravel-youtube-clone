<?php

namespace App\Jobs;

use App\Models\Video;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class GenerateThumbnailOfVideo implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public Video $video)
    {
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $path = 'video-thumbnails/' . $this->video->id . '.png';
        FFMpeg::open($this->video->original_video_path)
            ->getFrameFromSeconds(10)
            ->export()
            ->toDisk('public')
            ->save($path);
        $this->video->update(['video_thumbnail_path' => $path]);
    }
}
