<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\Contracts\DeveloperInterface;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

class DeveloperRepository implements DeveloperInterface
{
    public function __construct(protected Developer $developer)
    {
    }

    public function all(): Collection
    {
        return $this->developer->all();
    }

    public function insert(array $items): void
    {
        $this->developer->insert($items);
    }
}
