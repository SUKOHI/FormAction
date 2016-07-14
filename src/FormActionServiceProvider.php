<?php namespace Sukohi\FormAction;

use Illuminate\Support\ServiceProvider;

class FormActionServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var  bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
			__DIR__ .'/config/formaction.php' => config_path('formaction.php'),
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app['form-action'] = $this->app->share(function($app)
        {
            return new FormAction;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['form-action'];
    }

}