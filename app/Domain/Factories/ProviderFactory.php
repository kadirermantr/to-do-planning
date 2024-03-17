<?php

namespace App\Domain\Factories;

use App\Domain\Factories\Providers\TaskProvider1;
use App\Domain\Factories\Providers\TaskProvider2;
use Exception;

class ProviderFactory
{
    /**
     * @throws Exception
     */
    public static function create($provider)
    {
        return match (strtolower($provider)) {
            'provider1' => new TaskProvider1(),
            'provider2' => new TaskProvider2(),
            default => throw new Exception("$provider not found!"),
        };
    }
}
