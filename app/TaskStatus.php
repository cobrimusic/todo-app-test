<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaskStatus extends Model
{
    //

    protected $table = 'tasks_status';

    protected $fillable = [
        'task_id'
    ];

    public function Task()
    {
        return $this->belongsTo('App\Task');
    }
}
