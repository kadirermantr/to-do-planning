<?php

namespace App\Console\Commands;

use App\Domain\Services\TaskService;
use Illuminate\Console\Command;

class GetTasks extends Command
{
    protected $signature = 'app:get-tasks';

    protected $description = 'Gets tasks, process them and save to the database.';

    public function __construct(
        protected TaskService $taskService,
    ) {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $this->info("$this->signature started");

        $this->taskService->truncateTable();

        $providers = $this->getProviders();

        foreach ($providers as $provider) {
            $tasks = $this->taskService->get($provider);

            $this->taskService->insert($tasks);
        }

        $this->info("$this->signature finished");
    }

    private function getProviders(): array
    {
        return [
            'provider1',
            'provider2',
        ];
    }
}
