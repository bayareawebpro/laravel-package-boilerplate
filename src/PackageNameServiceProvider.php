<?php declare(strict_types=1);

namespace BayAreaWebPro\PackageName;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class PackageNameServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     */
    public function register(): void
    {
        $this->registerConfig();
        $this->registerBindings();
        $this->registerDatabase();

        $this->registerCommands();
        $this->registerPublishable();

        $this->registerComposers();
        $this->registerRoutes();
        $this->registerViews();
    }

    /**
     * Bootstrap the application services.
     */
    public function boot(): void
    {
        Request::macro('cloudflare_ip', function () {
            return $this->server('HTTP_CF_CONNECTING_IP', $this->ip());
        });
    }

    /**
     * Get the services provided by the provider.
     * @return array<int, string>
     */
    public function provides(): array
    {
        return [
            'package-name'
        ];
    }

    private function registerPublishable(): void
    {
        if (!$this->app->runningInConsole()) return;

        $this->publishes([
            __DIR__ . '/../public/package-name' => public_path('package-name'),
        ], 'package-name-assets');

        $this->publishes([
            __DIR__ . '/../config/config.php' => config_path('package-name'),
        ], 'package-name-config');
    }

    private function registerCommands(): void
    {
        $this->commands([
            Commands\InstallPackage::class,
        ]);
    }

    private function registerBindings(): void
    {
        $this->app->bind('package-name', PackageNameService::class);
    }

    private function registerDatabase(): void
    {
        Schema::defaultStringLength(255);
        Relation::enforceMorphMap([
            //'model'  => \App\Models\Model::class,
        ]);

        $this->loadMigrationsFrom([__DIR__ . '/../database/migrations']);
    }


    private function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'package-name');
    }

    private function registerComposers(): void
    {
        //View::composer(['layouts.app'], \App\Composers\FrontendHtmlComposer::class);
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'package-name');
    }

    private function registerRoutes(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadRoutesFrom(__DIR__ . '/../routes/console.php');
    }
}
