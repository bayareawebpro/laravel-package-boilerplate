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
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
    }

    /**
     * Make PackageNameService.
     * @return self
     */
    public static function make(): self
    {
        return app(static::class);
    }
}
