<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\TextUI\Application;
use function Orchestra\Testbench\workbench_path;
use Orchestra\Testbench\Attributes\WithMigration;

#[WithMigration]
class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;
    /**
     * Load package service provider
     * @param Application $app
     * @return array<int, string>
     */
    protected function getPackageProviders($app):array
    {
        return [PackageNameServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array<string, string>
     */
    protected function getPackageAliases($app):array
    {
        return [
            'PackageName' => PackageName::class,
        ];
    }

    /**
     * Define database migrations.
     * @return void
     */
    protected function defineDatabaseMigrations()
    {
        $this->loadMigrationsFrom(
            workbench_path('database/migrations')
        );
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }
}
