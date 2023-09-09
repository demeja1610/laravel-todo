<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            abstract: \App\Interfaces\Repositories\TaskRepositoryInterface::class,
            concrete: \App\Repositories\Task\TaskRepository::class
        );

        $this->app->bind(
            abstract: \App\Interfaces\Services\TaskServiceInterface::class,
            concrete: \App\Services\TaskService::class,
        );
    }


    public function boot(): void
    {
    }
}
