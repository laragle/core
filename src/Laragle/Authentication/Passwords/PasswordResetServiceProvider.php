<?php

namespace Laragle\Authentication\Passwords;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class PasswordResetServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerPasswordBroker();
    }

    /**
     * Register the password broker instance.
     *
     * @return void
     */
    protected function registerPasswordBroker()
    {
        $this->app->singleton('laragle.auth.password', function ($app) {
            return new PasswordBrokerManager($app);
        });

        $this->app->bind('laragle.auth.password.broker', function ($app) {
            return $app->make('laragle.auth.password')->broker();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['laragle.auth.password', 'laragle.auth.password.broker'];
    }
}
