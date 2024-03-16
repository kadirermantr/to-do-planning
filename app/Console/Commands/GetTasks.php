<?php

namespace App\Console\Commands;

use App\Domain\Factories\Contracts\TaskServiceInterface;
use Illuminate\Console\Command;

class GetTasks extends Command
{
    protected $signature = 'app:get-tasks';

    protected $description = 'Gets tasks, process them and save to the database.';

    public function __construct(
        protected TaskServiceInterface $taskService,
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
            $tasks = $this->taskService->getFromProvider($provider);

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
