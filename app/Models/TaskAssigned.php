<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TaskAssigned extends Model
{
    protected $table = 'tasks_assigned';

    protected $fillable = [
        'task_id',
        'developer_id',
        'duration',
    ];
}
