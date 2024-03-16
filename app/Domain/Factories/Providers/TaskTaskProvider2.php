<?php

namespace App\Domain\Factories\Providers;

use App\Domain\Factories\Contracts\TaskProviderInterface;
use App\Trait\TransformTasksTrait;
use Illuminate\Support\Facades\Http;

class TaskTaskProvider2 implements TaskProviderInterface
{
    use TransformTasksTrait;

    public function getTasks(): array
    {
        $request = Http::get('https://run.mocky.io/v3/7b0ff222-7a9c-4c54-9396-0df58e289143');
        $data = $request->json();

        return $this->transformData($data, 'id', 'value', 'estimated_duration');
    }
}
