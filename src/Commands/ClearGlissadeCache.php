<?php

namespace Eastslopestudio\Glissade\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class ClearGlissadeCache extends Command
{
    public $signature = 'glissade:clear-cache';

    public $description = 'Clears the Glissade image cache';

    public function handle()
    {
        $this->info('Clearing image cache');

        $disk = Storage::disk(config('glissade.disks.cache'));
        $cache = config('glissade.cache_path_prefix');

        if (! $disk->exists($cache)) {
            $this->error('No cache present!');

            return;
        }

        $disk->deleteDirectory($cache);

        $this->info('Cleared image cache');
    }
}
