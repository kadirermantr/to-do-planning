<?php

namespace App\Domain\Services;

use App\Domain\Factories\Contracts\TaskServiceInterface;
use App\Domain\Repositories\TaskRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskService implements TaskServiceInterface
{
    public function __construct(
        protected TaskRepository $taskRepository,
    ) {
    }

    public function all(): Collection
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
        $this->taskRepository->truncateTable();
    }
}
