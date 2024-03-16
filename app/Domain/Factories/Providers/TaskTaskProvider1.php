<?php

namespace App\Domain\Factories\Providers;

use App\Domain\Factories\Contracts\TaskProviderInterface;
use App\Trait\TransformTasksTrait;
use Illuminate\Support\Facades\Http;

class TaskTaskProvider1 implements TaskProviderInterface
{
    use TransformTasksTrait;

    public function getTasks(): array
    {
        $request = Http::get('https://run.mocky.io/v3/27b47d79-f382-4dee-b4fe-a0976ceda9cd');
        $data = $request->json();

        return $this->transformData($data, 'id', 'zorluk', 'sure');
    }
}
