<x-guest-layout>
<div class="flex flex-col mt-8 items-center justify-center">
    <h2 class="font-bold text-2xl mb-4">{{ $video->title }}</h2>
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
        <source src="{{ $video->public_video_url }}" type="application/x-mpegURL" />
        <p class="vjs-no-js">
            To view this video please enable JavaScript, and consider upgrading to a
            web browser that
            <a href="https://videojs.com/html5-video-support/" target="_blank"
            >supports HTML5 video</a
            >
        </p>
    </video>
</div>


</x-guest-layout>
