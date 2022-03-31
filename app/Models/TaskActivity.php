<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskActivity extends Model
{
    use HasFactory;
    //protected $guareded = ['id'];
    protected $fillable = ['task_act', 'user_id', 'year', 'month', 'week', 'report_date', 'task_description', 'task_working_hour', 'task_progress'];

    public function task()
    {
        return $this->belongsTo(Task::class, 'task_act');
    }
}
