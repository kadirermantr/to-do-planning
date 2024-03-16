<?php

namespace App\Domain\Factories\Contracts;

interface DeveloperInterface
{
    public function all();

    public function insert(array $items);
}
