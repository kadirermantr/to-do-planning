<?php

namespace Database\Seeders;

use App\Domain\Repositories\DeveloperRepository;
use Illuminate\Database\Seeder;

class DevelopersSeeder extends Seeder
{
    public function __construct(protected DeveloperRepository $developerRepository)
    {
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $developers = [
            ['name' => 'DEV1', 'efficiency' => 1],
            ['name' => 'DEV2', 'efficiency' => 2],
            ['name' => 'DEV3', 'efficiency' => 3],
            ['name' => 'DEV4', 'efficiency' => 4],
            ['name' => 'DEV5', 'efficiency' => 5],
        ];

        $this->developerRepository->insert($developers);
    }
}
