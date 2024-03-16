<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\Contracts\TaskInterface;
use App\Domain\Factories\ProviderFactory;
use App\Models\Task;
use Illuminate\Database\Eloquent\Collection;

class TaskRepository implements TaskInterface
{
    public function __construct(protected Task $task)
    {
    }

    public function all(): Collection
    {
        return $this->task->all();
    }

    public function getFromProvider(string $provider): array
    {
        $provider = ProviderFactory::create($provider);

        return $provider->getTasks();
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
