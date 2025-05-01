<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName\Tests\Feature;

use BayAreaWebPro\PackageName\Tests\TestCase;
use Workbench\App\Models\User;

class DefaultTest extends TestCase
{
    public function test_default(): void
    {
        dump(User::factory()->create());

        $this->assertDatabaseHas('users');
    }
}
