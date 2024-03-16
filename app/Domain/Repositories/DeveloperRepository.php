<?php

namespace App\Domain\Repositories;

use App\Domain\Factories\Contracts\DeveloperInterface;
use App\Models\Developer;
use Illuminate\Database\Eloquent\Collection;

class DeveloperRepository implements DeveloperInterface
{
    public function all(): Collection
    {
        return Developer::all();
    }

    public function insert(array $items): void
    {
        Developer::insert($items);
    }
}
