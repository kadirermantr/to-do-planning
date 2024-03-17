<?php

namespace App\Http\Controllers;

use App\Domain\Factories\Contracts\DeveloperServiceInterface;
use App\Domain\Factories\Contracts\TaskAssignedServiceInterface;
use App\Domain\Factories\Contracts\TaskServiceInterface;

class HomeController extends Controller
{
    public function __construct(
        protected TaskServiceInterface $taskService,
        protected TaskAssignedServiceInterface $taskAssignedService,
        protected DeveloperServiceInterface $developerService
    ) {
    }

    public function index()
    {
        $tasks = $this->taskAssignedService->all();

        $summaries = collect($tasks)->groupBy('developer_id')->map(function ($tasks) {
            return [
                'developer_name' => $tasks->first()->developer->name,
                'task_count' => $tasks->count(),
                'duration' => $tasks->sum('duration'),
            ];
        })->sortKeys();

        $totalDevelopers = $summaries->count();
        $totalTasks = $summaries->sum('task_count');
        $totalDuration = $summaries->sum('duration');

        $weeklyWorkHours = 45;
        $totalWeeks = round($totalDuration / ($totalDevelopers * $weeklyWorkHours), 2);

        return view('home', [
            'summaries' => $summaries,
            'totalDevelopers' => $totalDevelopers,
            'totalTasks' => $totalTasks,
            'totalDuration' => $totalDuration,
            'totalWeek' => $totalWeeks,
        ]);
    }
}
