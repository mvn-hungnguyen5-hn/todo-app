<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(\App\Repositories\Interfaces\RepositoryInterface::class, \App\Repositories\Eloquent\BaseRepository::class);
        $this->app->bind(\App\Repositories\Interfaces\TodoRepositoryInterface::class, \App\Repositories\Eloquent\TodoRepository::class);
        $this->app->bind(\App\Repositories\Interfaces\UserRepositoryInterface::class, \App\Repositories\Eloquent\UserRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useBootstrap();
    }
}
