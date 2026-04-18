<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests\Unit;

use BayAreaWebPro\PackageName\PackageName;
use BayAreaWebPro\PackageName\PackageNameService;
use BayAreaWebPro\PackageName\Tests\TestCase;

class UnitTest extends TestCase
{
    public function test_service_can_make_itself(): void
    {
        $this->assertInstanceOf(
            PackageNameService::class,
            PackageName::make(),
            'Service can make itself.'
        );
    }
}
