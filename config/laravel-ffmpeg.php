<?php

return [
    'ffmpeg' => [
        'binaries' => base_path('ffmpeg-binaries/ffmpeg'),
        'threads'  => 4,
    ],

    'ffprobe' => [
        'binaries' => base_path('ffmpeg-binaries/ffprobe'),
    ],

    'timeout' => 3600,

    'enable_logging' => true,

    'set_command_and_error_output_on_exception' => false,

    'temporary_files_root' => env('FFMPEG_TEMPORARY_FILES_ROOT', sys_get_temp_dir()),
];
