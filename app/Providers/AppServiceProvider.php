<?php

namespace App\Providers;

use App\Domain\Factories\Contracts\DeveloperInterface;
use App\Domain\Factories\Contracts\TaskInterface;
use App\Domain\Repositories\DeveloperRepository;
use App\Domain\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TaskInterface::class, TaskRepository::class);
        $this->app->bind(DeveloperInterface::class, DeveloperRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
