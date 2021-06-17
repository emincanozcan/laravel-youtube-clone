<x-guest-layout>
    <div class="flex flex-col mt-8 items-center justify-center">
        <video
            id="watch-player"
            class="video-js "
            controls
            preload="auto"
            width="640"
            height="360"
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
        <h2 class="font-bold text-2xl mt-4 mb-4">{{ $video->title }}</h2>
        <div class="flex items-center space-x-12">
            <span>View Count: {{ $video->view_count }}</span>
            <div>
                @livewire('watch.video-liking', ['video' => $video])
            </div>
        </div>
        <div class="w-full mt-8">
            <div class="w-1/2 mx-auto space-y-12">
                @livewire('watch.comment-form', ['video' => $video])
                @livewire('watch.comment-list', ['video' => $video])
            </div>
        </div>
    </div>


</x-guest-layout>
