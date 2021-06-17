<div>
    <h3 class="text-3xl font-medium mb-8">Comments</h3>
    <div>
        @foreach($commentList as $comment)
            <livewire:watch.single-comment :comment="$comment" :key="$comment->id"/>
        @endforeach
    </div>
</div>
