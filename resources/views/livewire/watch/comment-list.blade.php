<div>
    @foreach($commentList as $comment)
        <livewire:watch.single-comment :comment="$comment" :key="$comment->id"/>
    @endforeach
</div>
