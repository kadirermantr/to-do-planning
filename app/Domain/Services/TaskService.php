<?php

namespace App\Domain\Services;

use App\Domain\Repositories\TaskRepository;

class TaskService
{
    public function __construct(
        protected TaskRepository $taskRepository,
    ) {
    }

    public function all()
    {
        return $this->taskRepository->all();
    }

    public function getFromProvider(string $provider): array
    {
        return $this->taskRepository->getFromProvider($provider);
    }

    public function insert(array $items): void
    {
        $this->taskRepository->insert($items);
    }

    public function truncateTable(): void
    {
        $this->taskRepository->truncate();
    }
}
