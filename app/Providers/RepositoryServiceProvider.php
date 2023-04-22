<?php

namespace App\Providers;

use App\Repositories\MediaRepository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;

// https://www.twilio.com/blog/repository-pattern-in-laravel-application
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(MediaRepository::class, function(Application $app) {
            return new MediaRepository();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
