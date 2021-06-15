<?php

namespace App\Http\Livewire\Watch;

use App\Models\Comment;
use App\Models\Video;
use Livewire\Component;

class CommentForm extends Component
{
    public Video $video;
    public string $body = '';

    public function submit()
    {
        $this->validate(['body' => 'required|min:1']);
        auth()->user()->channel->comments()->create([
            'video_id' => $this->video->id,
            'body' => $this->body
        ]);
        $this->body = '';
        $this->dispatchBrowserEvent('comment-submit');
    }

    public function render()
    {
        return view('livewire.watch.comment-form');
    }
}
