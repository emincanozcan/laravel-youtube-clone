<?php

namespace App\Http\Livewire\Watch;

use App\Models\Comment;
use Livewire\Component;

class SingleComment extends Component
{
    public Comment $comment;

    protected $listeners = ['newComment'];

    public function newComment($arr)
    {
        if ($arr['comment']['comment_id'] === $this->comment->id) {
            $this->comment->refresh();
        }
    }

    public function render()
    {
        return view('livewire.watch.single-comment');
    }
}
