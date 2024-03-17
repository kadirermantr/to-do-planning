<?php

namespace App\Domain\Factories\Contracts;

interface TaskAssignedInterface
{
    public function all();

    public function insert(array $items);

    public function truncateTable();
}
