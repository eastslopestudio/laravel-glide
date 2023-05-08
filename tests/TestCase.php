<?php

namespace Eastslopestudio\Glissade\Tests;

use Eastslopestudio\Glissade\Facades\Glissade;
use Eastslopestudio\Glissade\GlissadeServiceProvider;
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

        $app['config']->set('glissade.disks.source', 'source');

        $app['config']->set('filesystems.disks.cache', [
            'driver' => 'local',
            'root' => __DIR__.'/../cache',
            'throw' => false,
        ]);

        $app['config']->set('glissade.disks.cache', 'cache');
    }

    protected function getPackageProviders($app): array
    {
        return [GlissadeServiceProvider::class];
    }

    protected function getPackageAliases($app): array
    {
        return [
            'Glissade' => Glissade::class,
        ];
    }
}
