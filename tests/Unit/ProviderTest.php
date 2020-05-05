<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests\Unit;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameService;
use BayAreaWebPro\PackageName\PackageNameServiceProvider;
use BayAreaWebPro\PackageName\Tests\TestCase;

class ProviderTest extends TestCase
{
    public function test_provider_is_registered()
    {
        $this->assertInstanceOf(
            PackageNameServiceProvider::class,
            $this->app->getProvider(PackageNameServiceProvider::class),
            'Provider is registered with container.'
        );
    }

    public function test_provider_declares_provided()
    {
        $this->assertTrue(in_array('package-name',
                collect(app()->getProviders(PackageNameServiceProvider::class))
                ->first()
                ->provides()
        ), 'Provider declares provided services.');
    }

    public function test_container_can_resolve_instance()
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            $this->app->make('package-name'),
            'Container can make instance of service.'
        );
    }

    public function test_alias_can_resolve_instance()
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            \PackageName::getFacadeRoot(),
            'Alias class can make instance of service.'
        );
    }

    public function test_facade_can_resolve_instance()
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            PackageName::getFacadeRoot(),
            'Facade can make instance of service.'
        );
    }
}
