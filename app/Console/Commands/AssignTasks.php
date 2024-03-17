<?php

namespace App\Console\Commands;

use App\Domain\Factories\Contracts\DeveloperServiceInterface;
use App\Domain\Factories\Contracts\TaskAssignedServiceInterface;
use App\Domain\Factories\Contracts\TaskServiceInterface;
use Exception;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class AssignTasks extends Command
{
    protected $signature = 'app:assign-tasks';

    protected $description = 'Assigns tasks to developers based on their efficiency';

    private const MAX_HOURS_PER_WEEK = 45;

    public function __construct(
        protected TaskServiceInterface $taskService,
        protected TaskAssignedServiceInterface $taskAssignedService,
        protected DeveloperServiceInterface $developerService
    ) {
        parent::__construct();
    }

    public function handle(): void
    {
        $this->info("$this->signature started");

        try {
            $this->taskAssignedService->truncateTable();

            $developers = collect($this->developerService->all())->sortByDesc('efficiency');
            $tasks = collect($this->taskService->all())->sortByDesc('difficulty');
            $developerHours = $developers->mapWithKeys(fn ($dev) => [$dev->id => 0]);

            $tasks->each(fn ($task) => $this->assignTask($task, $developers, $developerHours));

            $this->info("$this->signature finished");
        } catch (Exception $e) {
            $this->error('An error occurred: '.$e->getMessage());
        }
    }

    protected function assignTask(object $task, Collection $developers, Collection &$developerHours): void
    {
        $assigned = $developers->first(function ($developer) use ($task, &$developerHours) {
            $taskDuration = $this->calculateDuration($task, $developer);

            if ($this->canAssignTask($developerHours->get($developer->id), $taskDuration)) {
                $this->assignTaskToDeveloper($task, $developer, $taskDuration);
                $developerHours[$developer->id] += $taskDuration;

                return true;
            }

            return false;
        });

        if (! $assigned) {
            $this->assignToOtherDeveloper($task, $developers, $developerHours);
        }
    }

    protected function calculateDuration(object $task, object $developer): float
    {
        return round($task->duration / $task->difficulty * $developer->efficiency, 2);
    }

    protected function canAssignTask(float $currentHours, float $taskDuration): bool
    {
        return ($currentHours + $taskDuration) <= self::MAX_HOURS_PER_WEEK;
    }

    protected function assignToOtherDeveloper(object $task, Collection $developers, Collection &$developerHours): void
    {
        $leastBusyDeveloperId = $developerHours->search(min($developerHours->all()));
        $developer = $developers->where('id', $leastBusyDeveloperId)->first();
        $taskDuration = $this->calculateDuration($task, $developer);
        $this->assignTaskToDeveloper($task, $developer, $taskDuration);
        $developerHours[$leastBusyDeveloperId] += $taskDuration;
    }

    protected function assignTaskToDeveloper(object $task, object $developer, float $taskDuration): void
    {
        $this->taskAssignedService->insert([
            'task_id' => $task->id,
            'developer_id' => $developer->id,
            'duration' => $taskDuration,
        ]);
    }
}
