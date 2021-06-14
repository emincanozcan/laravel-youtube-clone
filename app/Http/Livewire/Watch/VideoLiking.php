<?php

namespace App\Http\Livewire\Watch;

use App\Models\Video;
use Livewire\Component;

class VideoLiking extends Component
{
    public Video $video;
    public string $status = "";

    protected function setStatus()
    {
        if (!auth()->check()) {
            return;
        }

        $videoLiking = auth()->user()->videoLikings()->where('video_id', $this->video->id)->first();
        if ($videoLiking) {
            return $this->status = $videoLiking->type === \App\Models\VideoLiking::LIKE ? 'liked' : 'disliked';
        }
        $this->status = "";
    }

    public function mount()
    {
        $this->setStatus();
    }

    public function submit($type)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $videoLiking = auth()->user()->videoLikings()->where('video_id', $this->video->id)->first();

        if (!$videoLiking) {
            $type === "like"
                ? auth()->user()->likeVideo($this->video)
                : auth()->user()->dislikeVideo($this->video);
        } else {
            $check = $type === "like" ? \App\Models\VideoLiking::LIKE : \App\Models\VideoLiking::DISLIKE;
            $videoLiking->type === $check
                ? $videoLiking->delete()
                : $videoLiking->toggle();
        }

        $this->video->refresh();
        $this->setStatus();
    }

    public function render()
    {
        return view('livewire.watch.video-liking');
    }
}
