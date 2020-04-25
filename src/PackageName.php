<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Support\Facades\Facade;

/**
 * @see \BayAreaWebPro\PackageName\PackageNameService
 * @method static PackageNameService make()
 */
class PackageName extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'package-name';
    }
}
