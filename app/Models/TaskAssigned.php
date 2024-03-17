<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskAssigned extends Model
{
    protected $table = 'tasks_assigned';

    protected $fillable = [
        'task_id',
        'developer_id',
        'duration',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

    public function developer(): BelongsTo
    {
        return $this->belongsTo(Developer::class);
    }
}
