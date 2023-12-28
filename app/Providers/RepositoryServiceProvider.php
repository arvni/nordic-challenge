<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $models = [
            "User"
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Repositories\Interfaces\\{$model}RepositoryInterface", "App\Repositories\\{$model}Repository");
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
