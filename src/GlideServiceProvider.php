<?php

namespace Eastslopestudio\Glide;

use Eastslopestudio\Glide\Commands\ClearGlideCache;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GlideServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-glide')
            ->hasConfigFile()
            ->hasCommand(ClearGlideCache::class)
            ->hasRoute('web');
    }
}
