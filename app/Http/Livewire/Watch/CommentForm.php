<?php

namespace App\Http\Livewire\Watch;

use App\Models\Comment;
use App\Models\Video;
use Livewire\Component;

class CommentForm extends Component
{
    public $video = null;
    public $parentComment = null;
    public int $videoId;

    public string $body = '';

    public function mount()
    {
        if ($this->video) {
            $this->videoId = $this->video->id;
        } else if ($this->parentComment) {
            $this->videoId = $this->parentComment->video_id;
        }
    }

    public function submit()
    {
        $this->validate(['body' => 'required|min:1']);
        $comment = auth()->user()->channel->comments()->create([
            'video_id' => $this->videoId,
            'comment_id' => $this->parentComment ? $this->parentComment->id : null,
            'body' => $this->body
        ]);
        $this->body = '';
        $this->dispatchBrowserEvent('comment-submit');
        $this->emit('newComment', ['comment' => $comment]);
    }

    public function redirectToLogin()
    {
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.watch.comment-form');
    }
}
