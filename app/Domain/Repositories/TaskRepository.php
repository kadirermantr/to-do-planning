<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\Contracts\TaskInterface;
use App\Domain\Factories\ProviderFactory;
use App\Models\Task;

class TaskRepository implements TaskInterface
{
    public function getFromProvider(string $provider): array
    {
        $provider = ProviderFactory::create($provider);

        return $provider->getTasks();
    }

    public function insert(array $tasks): void
    {
        Task::insert($tasks);
    }

    public function truncate(): void
    {
        Task::truncate();
    }
}
