<?php

namespace App\Domain\Services;

use App\Domain\Repositories\TaskRepository;

class TaskService
{
    public function __construct(
        protected TaskRepository $taskRepository,
    ) {
    }

    public function getFromProvider(string $provider): array
    {
        return $this->taskRepository->getFromProvider($provider);
    }

    public function insert(array $tasks): void
    {
        $this->taskRepository->insert($tasks);
    }

    public function truncateTable(): void
    {
        $this->taskRepository->truncate();
    }
}
