<?php

namespace App\Http\Livewire\Studio;

use App\Jobs\GenerateThumbnailOfVideo;
use App\Jobs\GenerateVideosForPublic;
use Livewire\Component;
use Livewire\WithFileUploads;

class UploadForm extends Component
{
    use WithFileUploads;
    public $title;
    public $video;

    public function submit()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'video' => 'required|file|mimes:mp4|max:102400'
        ]);

        $video = auth()->user()->channel->videos()->create([
            'title' => $this->title,
            'original_video_path' => $this->video->store('original-videos')
        ]);

        GenerateThumbnailOfVideo::dispatch($video);
        GenerateVideosForPublic::dispatch($video);

        return redirect()->route('studio.videos');
    }

    public function render()
    {
        return view('livewire.studio.upload-form');
    }
}
