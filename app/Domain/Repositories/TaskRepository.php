<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\ProviderFactory;
use App\Models\Task;

class TaskRepository
{
    public function getTasks(string $provider): array
    {
        $provider = ProviderFactory::create($provider);

        return $provider->getTasks();
    }

    public function insert(array $tasks)
    {
        Task::insert($tasks);
    }

    public function truncate()
    {
        Task::truncate();
    }
}
