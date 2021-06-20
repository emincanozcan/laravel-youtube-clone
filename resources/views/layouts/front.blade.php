<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet"/>
    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
<div class="font-sans text-gray-900 antialiased">
    <header class="bg-gray-800 px-8 flex items-center justify-between py-4 sticky top-0 left-0 z-50">
        <h2 class="font-bold text-white text-xl">YoutubeClone</h2>
        <div class="flex items-center w-1/3">
            <input type="text" class="w-full bg-gray-900 border border-gray-700 text-white h-8">
            <button class="bg-gray-700 text-gray-500 h-8 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
        <div class="text-gray-300">Icons will be here.</div>
    </header>
    @yield('content')
</div>

<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/videojs-contrib-quality-levels@2.1.0/dist/videojs-contrib-quality-levels.min.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.4/dist/videojs-hls-quality-selector.min.js"></script>
<script>
    if (document.querySelector('video#watch-player')) {
        var player = videojs('watch-player');
        player.hlsQualitySelector({
            displayCurrentQuality: true,
        });
    }
</script>
@stack('modals')
@livewireScripts
</body>
</html>
