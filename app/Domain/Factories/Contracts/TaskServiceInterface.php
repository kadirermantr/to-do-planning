<?php

namespace App\Domain\Factories\Contracts;

interface TaskServiceInterface
{
    public function all();

    public function getFromProvider(string $provider);

    public function insert(array $items);

    public function truncateTable();
}
