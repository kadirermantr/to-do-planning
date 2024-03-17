<?php

namespace App\Domain\Services;

use App\Domain\Factories\Contracts\TaskAssignedServiceInterface;
use App\Domain\Repositories\TaskAssignedRepository;
use Illuminate\Database\Eloquent\Collection;

class TaskAssignedService implements TaskAssignedServiceInterface
{
    public function __construct(
        protected TaskAssignedRepository $taskRepository,
    ) {
    }

    public function all(): Collection
    {
        return $this->taskRepository->all();
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
