<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\Contracts\TaskAssignedInterface;
use App\Models\TaskAssigned;
use Illuminate\Database\Eloquent\Collection;

class TaskAssignedRepository implements TaskAssignedInterface
{
    public function __construct(protected TaskAssigned $task)
    {
    }

    public function all(): Collection
    {
        return $this->task->with('task', 'developer')->get();
    }

    public function insert(array $items): void
    {
        $this->task->insert($items);
    }

    public function truncateTable(): void
    {
        $this->task->truncate();
    }
}
