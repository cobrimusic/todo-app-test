<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\TaskStatus;

class Task extends Model
{
    //

    protected $fillable = [
        'title',
        'short_description'
    ];

    public function taskstatus()
    {
        return $this->hasOne(TaskStatus::class, 'task_id');
    }
}
