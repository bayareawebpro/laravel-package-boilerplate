<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Support\ServiceProvider;

class PackageNameServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        //$this->loadTranslationsFrom(__DIR__.'/../lang', 'package-name');

        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'package-name');

        if ($this->app->runningInConsole()) {

            //$this->commands([]);

            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('package-name.php'),
            ], 'config');

            //$this->publishes([
            //    __DIR__.'/../lang' => resource_path('lang/vendor/package-name'),
            //], 'lang');
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->app->bind('package-name', PackageNameService::class);
    }

    /**
     * Get the services provided by the provider.
     * @return array
     */
    public function provides()
    {
        return [
            'package-name'
        ];
    }
}
