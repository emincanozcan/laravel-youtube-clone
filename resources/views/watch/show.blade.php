@extends('layouts.front')
@section('content')
<div class="w-full" style="height: 80vh">
    <video
        id="watch-player"
        class="video-js vjs-big-play-centered w-full h-full"
        controls
        preload="auto"
        poster="{{ $video->video_thumbnail_url }}"
        data-setup="{}"
    >
        <source src="{{ $video->public_video_url }}" type="application/x-mpegURL"/>
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
            >supports HTML5 video</a
            >
        </p>
    </video>
</div>
<div class="max-w-7xl w-full mx-auto flex space-x-8 mt-8">
    <div class="w-4/5">
         <h1 class="font-medium text-2xl text-gray-900">{{ $video->title }}</h1>
        <div class="mt-2 flex justify-between items-end border-b border-gray-200 pb-4">
            <span class="text-gray-600 text-sm">View Count: {{ $video->view_count }} • {{ $video->created_at->format('d M Y') }}</span>
            @livewire('watch.video-liking', ['video' => $video])
        </div>
        <div class="flex space-x-4 items-center mt-4 border-b border-gray-200 pb-4">
            <img class="rounded-full h-12 w-12" src="{{ $video->channel->channel_photo_url }}" alt="">
            <span class="font-bold text-gray-800">{{ $video->channel->name }}</span>
        </div>
        <h4 class="text-lg font-medium text-gray-900 mb-4 mt-6">{{ $video->comments()->count() }} Comments</h4>
        <div class="space-y-4">
            @livewire('watch.comment-form', ['video' => $video])
            @livewire('watch.comment-list', ['video' => $video])
        </div>
    </div>
    <div class="w-1/5 bg-green-400 h-96">Right</div>
</div>
    <div class="flex flex-col mt-8 items-center justify-center">
        <h2 class="font-bold text-2xl mt-4 mb-4"></h2>
        <div class="flex items-center space-x-12">
            <span>View Count: {{ $video->view_count }}</span>
            <div>

            </div>
        </div>
        <div class="w-full mt-8">
            <div class="w-1/2 mx-auto space-y-12">
            </div>
        </div>
    </div>
@endsection
