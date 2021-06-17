<div class="mt-6 flex space-x-4" x-data="{
    showCommentForm: false,
    showReplies: false,
}">
    <img class="h-12 w-12 rounded-full" src="{{ auth()->user()->channel->channel_photo_url }}">
    <div class="flex flex-col items-start">
        <div>
            <span class="text-gray-800 font-bold">{{ $comment->channel->name }}</span>
            <span class="text-gray-500 text-sm ml-2">{{ $comment->created_at->diffForHumans() }}</span>
        </div>
        <p class="mt-1 mb-3">{{ $comment->body }}</p>
        <button class="text-gray-500 font-medium" @click="showCommentForm = !showCommentForm">REPLY</button>
        <div x-show="showCommentForm">
            <livewire:watch.comment-form :parentComment="$comment"/>
        </div>
        @if($comment->replies->count() > 0)
            <button class="text-blue-600 font-bold" @click="showReplies = !showReplies">
                <span x-show="!showReplies">View {{ $comment->replies->count() }} Replies</span>
                <span x-show="showReplies">Hide Replies</span>
            </button>
            <div class="ml-4" x-show="showReplies">
                @foreach($comment->replies as $reply)
                    <livewire:watch.single-comment :comment="$reply" :key="$reply->id"/>
                @endforeach
            </div>
        @endif
    </div>
</div>
