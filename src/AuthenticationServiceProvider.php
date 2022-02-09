<?php

namespace Insyghts\Authentication;

use Illuminate\Support\ServiceProvider;


class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->make('Insyghts\Authentication\Controllers\UserController');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__.'/routes.php';
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');



    }
}
