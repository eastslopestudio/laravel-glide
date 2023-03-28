<?php

return [

    'disks' => [
        'source' => env('GLIDE_DISK_SOURCE', 'public'),
        'cache' => env('GLIDE_DISK_CACHE', 'local'),
    ],

    'cache_path_prefix' => '.glide-cache',

    'max_image_size' => 2000 * 2000,

    'base_url' => 'glide/image',

];
