<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Support\Facades\Facade;

/**
 * @mixin \BayAreaWebPro\PackageName\PackageNameService
 */
class PackageName extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'package-name';
    }
}
