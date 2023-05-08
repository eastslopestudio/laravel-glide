<?php

return [

    'disks' => [
        'source' => env('GLISSADE_DISK_SOURCE', 'public'),
        'cache' => env('GLISSADE_DISK_CACHE', 'local'),
    ],

    'cache_path_prefix' => '.glissade-cache',

    'max_image_size' => 2000 * 2000,

    'base_url' => 'glissade/image',

];
