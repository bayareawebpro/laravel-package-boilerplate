<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests\Feature;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameService;
use BayAreaWebPro\PackageName\PackageNameServiceProvider;
use BayAreaWebPro\PackageName\Tests\TestCase;

class ProviderTest extends TestCase
{
    /** @noinspection PhpParamsInspection */
    public function test_provider_is_registered(): void
    {
        $this->assertInstanceOf(
            PackageNameServiceProvider::class,
            $this->app->getProvider(PackageNameServiceProvider::class),
            'Provider is registered with container.'
        );
    }

    /** @noinspection PhpParamsInspection */
    public function test_provider_declares_provided(): void
    {
        $provider = $this->app->getProvider(PackageNameServiceProvider::class);

        $this->assertTrue(in_array('package-name', $provider->provides()), 'Provider declares provided services.');
    }

    public function test_container_can_resolve_instance(): void
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            $this->app->make('package-name'),
            'Container can make instance of service.'
        );
    }

    public function test_alias_can_resolve_instance(): void
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            \PackageName::getFacadeRoot(),
            'Alias class can make instance of service.'
        );
    }

    public function test_facade_can_resolve_instance(): void
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            PackageName::getFacadeRoot(),
            'Facade can make instance of service.'
        );
    }
}
