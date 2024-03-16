<?php

namespace App\Trait;

trait TransformTasksTrait
{
    public function transformData(array $items, string $nameKey, string $difficultyKey, string $durationKey): array
    {
        $data = [];

        foreach ($items as $item) {
            $data[] = [
                'name' => $item[$nameKey],
                'difficulty' => $item[$difficultyKey],
                'duration' => $item[$durationKey],
            ];
        }

        return $data;
    }
}
