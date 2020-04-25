<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{

    /**
     * Load package service provider
     * @param Application $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [PackageNameServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
            'PackageName' => PackageName::class,
        ];
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->withFactories(__DIR__.'/Fixtures/Factories');
        $this->loadMigrationsFrom(__DIR__ . '/Fixtures/Migrations');
        require __DIR__.'/Fixtures/routes.php';
    }
}
