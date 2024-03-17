<?php

namespace App\Domain\Factories\Contracts;

interface TaskAssignedServiceInterface
{
    public function all();

    public function insert(array $items);

    public function truncateTable();
}
