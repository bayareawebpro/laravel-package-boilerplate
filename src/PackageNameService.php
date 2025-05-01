<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Contracts\Config\Repository as Config;

class PackageNameService
{
    /**
     * Config Repository.
     */
    protected Config $config;

    /**
     * PackageNameService constructor.
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Make PackageNameService.
     */
    public static function make(): static
    {
        return app(static::class);
    }
}
