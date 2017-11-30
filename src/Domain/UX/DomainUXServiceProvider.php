<?php namespace Domain\UX;

use Illuminate\Support\ServiceProvider;

/**
 * Class DomainUXServiceProvider
 * @package Domain\UX
 */
class DomainUXServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('domain/ux');

        $this->requires();

        //$this->setConnection();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Gets Laravel Application instance
     * @return \Illuminate\Foundation\Application
     */
    protected function getApp()
    {
        return $this->app;
    }

    /**
     * Require packages or alternate resources
     * @param null $packages
     */
    protected function requires($packages = null)
    {
        $application = $this->getApp();
        $app = $application->app;
        $resources = __DIR__.'/Resources/'.'*.php';
        $routes = __DIR__.'/Routes/'.'*.php';
        $resources = glob($resources);
        $routes = glob($routes);

        $files = array_merge($routes, $resources);
        foreach ($files as $file) {
            require $file;
        }

        if (is_array($packages)) {
            foreach ($packages as $file) {
                require $file;
            }
        } else {
            if (!is_null($packages)) {
                require $packages;
            }
        }
    }
}