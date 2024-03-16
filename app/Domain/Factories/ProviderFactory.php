<?php

namespace App\Domain\Factories;

use App\Domain\Factories\Providers\TaskTaskProvider1;
use App\Domain\Factories\Providers\TaskTaskProvider2;
use Exception;

class ProviderFactory
{
    /**
     * @throws Exception
     */
    public static function create($provider)
    {
        return match (strtolower($provider)) {
            'provider1' => new TaskTaskProvider1(),
            'provider2' => new TaskTaskProvider2(),
            default => throw new Exception("$provider not found!"),
        };
    }
}
