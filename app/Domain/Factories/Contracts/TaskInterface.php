<?php

namespace App\Domain\Factories\Contracts;

interface TaskInterface
{
    public function all();

    public function getFromProvider(string $provider);

    public function insert(array $tasks);

    public function truncate();
}
