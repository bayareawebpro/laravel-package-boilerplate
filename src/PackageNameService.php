<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Contracts\Config\Repository as Config;
use Illuminate\Support\Facades\App;

class PackageNameService
{

    public function __construct(protected Config $config)
    {
        //
    }


    public static function make(): static
    {
        return App::make(static::class);
    }
}
