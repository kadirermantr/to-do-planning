<?php

namespace App\Providers;

use App\Domain\Factories\Contracts\DeveloperInterface;
use App\Domain\Factories\Contracts\DeveloperServiceInterface;
use App\Domain\Factories\Contracts\TaskAssignedInterface;
use App\Domain\Factories\Contracts\TaskAssignedServiceInterface;
use App\Domain\Factories\Contracts\TaskInterface;
use App\Domain\Factories\Contracts\TaskServiceInterface;
use App\Domain\Repositories\DeveloperRepository;
use App\Domain\Repositories\TaskAssignedRepository;
use App\Domain\Repositories\TaskRepository;
use App\Domain\Services\DeveloperService;
use App\Domain\Services\TaskAssignedService;
use App\Domain\Services\TaskService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Repositories
        $this->app->bind(TaskInterface::class, TaskRepository::class);
        $this->app->bind(DeveloperInterface::class, DeveloperRepository::class);
        $this->app->bind(TaskAssignedInterface::class, TaskAssignedRepository::class);
        $this->app->bind(DeveloperInterface::class, DeveloperRepository::class);

        // Services
        $this->app->bind(TaskServiceInterface::class, TaskService::class);
        $this->app->bind(TaskAssignedServiceInterface::class, TaskAssignedService::class);
        $this->app->bind(DeveloperServiceInterface::class, DeveloperService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
