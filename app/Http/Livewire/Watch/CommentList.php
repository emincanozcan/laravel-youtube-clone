<?php

namespace App\Http\Livewire\Watch;

use App\Models\Comment;
use Livewire\Component;

class CommentList extends Component
{
    public $video;
    public $commentList;
    protected $listeners = ['newComment'];

    public function newComment($arr)
    {
        if (!$arr['comment']['comment_id']) {
            $comment = Comment::find($arr['comment']['id']);
            $this->commentList->prepend($comment);
        }
    }

    public function mount()
    {
        $this->commentList = $this->video->comments()
            ->notReply()
            ->orderByDesc('id')
            ->get();
    }

    public function render()
    {
        return view('livewire.watch.comment-list');
    }
}
