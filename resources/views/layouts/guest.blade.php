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
        <link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            {{ $slot }}
        </div>

        <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-contrib-quality-levels@2.1.0/dist/videojs-contrib-quality-levels.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/videojs-hls-quality-selector@1.1.4/dist/videojs-hls-quality-selector.min.js"></script>
        <script>
            if(document.querySelector('video#watch-player')){
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
