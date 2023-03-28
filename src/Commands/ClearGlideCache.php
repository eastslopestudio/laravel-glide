<?php

namespace Eastslopestudio\Glide\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearGlideCache extends Command
{
    public $signature = 'glide:clear-cache';

    public $description = 'Clears the Laravel Glide image cache';

    public function handle()
    {
        $this->info('Clearing image cache');

        $disk = Storage::disk(config('glide.disks.cache'));
        $cache = config('glide.cache_path_prefix');

        if (! $disk->exists($cache)) {
            $this->error('No cache present!');

            return;
        }

        $disk->deleteDirectory($cache);

        $this->info('Cleared image cache');
    }
}
