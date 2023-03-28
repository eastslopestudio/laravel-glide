<?php

namespace Eastslopestudio\Glide\Tests;

use Eastslopestudio\Glide\Facades\Glide;
use Eastslopestudio\Glide\GlideServiceProvider;
use Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function getEnvironmentSetUp($app): void
    {
        $app['config']->set('filesystems.disks.source', [
            'driver' => 'local',
            'root' => __DIR__.'/../media',
            'throw' => false,
        ]);

        $app['config']->set('glide.disks.source', 'source');

        $app['config']->set('filesystems.disks.cache', [
            'driver' => 'local',
            'root' => __DIR__.'/../cache',
            'throw' => false,
        ]);

        $app['config']->set('glide.disks.cache', 'cache');
    }

    protected function getPackageProviders($app): array
    {
        return [GlideServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Glide' => Glide::class,
        ];
    }
}
