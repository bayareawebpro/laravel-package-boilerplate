<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameServiceProvider;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Orchestra\Testbench\Attributes\WithMigration;
use Orchestra\Testbench\Concerns\WithWorkbench;
use PHPUnit\TextUI\Application;
use function Orchestra\Testbench\workbench_path;

#[WithMigration]
class TestCase extends \Orchestra\Testbench\TestCase
{
    use WithWorkbench;
    use LazilyRefreshDatabase;

    /**
     * Load package service provider
     * @param Application $app
     * @return array<int, string>
     */
    protected function getPackageProviders($app): array
    {
        return [PackageNameServiceProvider::class];
    }

    /**
     * Load package alias
     * @param \Illuminate\Foundation\Application $app
     * @return array<string, string>
     */
    protected function getPackageAliases($app): array
    {
        return [
            'PackageName' => PackageName::class,
        ];
    }

    /**
     * Define database migrations.
     * @return void
     */
    protected function defineDatabaseMigrations(): void
    {
        $this->loadMigrationsFrom(
            workbench_path('database/migrations')
        );
    }

    /**
     * Define environment.
     * @param $app
     * @return void
     */
    protected function defineEnvironment($app): void
    {
        $app['config']->set('database.default', 'testing');
    }

    /**
     * Get the application timezone.
     *
     * @param \Illuminate\Foundation\Application $app
     * @return string|null
     */
    protected function getApplicationTimezone($app): string|null
    {
        return 'America/Los_Angeles';
    }

    /**
     * Setup the test environment.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }
}
