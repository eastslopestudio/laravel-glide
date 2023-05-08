<?php

namespace Eastslopestudio\Glissade;

use Eastslopestudio\Glissade\Commands\ClearGlissadeCache;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class GlissadeServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-glissade')
            ->hasConfigFile()
            ->hasCommand(ClearGlissadeCache::class)
            ->hasRoute('web');
    }
}
