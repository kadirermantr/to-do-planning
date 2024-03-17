<?php

namespace App\Domain\Services;

use App\Domain\Factories\Contracts\DeveloperServiceInterface;
use App\Domain\Repositories\DeveloperRepository;
use Illuminate\Database\Eloquent\Collection;

class DeveloperService implements DeveloperServiceInterface
{
    public function __construct(
        protected DeveloperRepository $repository,
    ) {
    }

    public function all(): Collection
    {
        return $this->repository->all();
    }
}
