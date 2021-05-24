<?php

namespace App\Jobs;

use App\Models\Video;
use FFMpeg\Format\Video\X264;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

class GenerateVideosForPublic implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    public function __construct(public Video $video)
    {
    }

    public function handle()
    {
        $path = 'videos/' . $this->video->id . '/' . $this->video->id . '.m3u8';
        $lowBitrate = (new X264)->setKiloBitrate(800);
        $midBitrate = (new X264)->setKiloBitrate(1500);
        $highBitrate = (new X264)->setKiloBitrate(4000);

        FFMpeg::open($this->video->original_video_path)
            ->exportForHLS()
            ->addFormat($lowBitrate, fn($media) => $media->scale(640, 360))
            ->addFormat($midBitrate, fn($media) => $media->scale(1280, 720))
            ->addFormat($highBitrate, fn($media) => $media->scale(1920, 1080))
            ->onProgress(function ($percentage) {
                $this->video->update(['process_progress_percentage' => $percentage]);
            })
            ->toDisk('public')
            ->save($path);

        $this->video->update(['public_video_path' => $path]);
    }
}
