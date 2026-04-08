<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'task',
        'done',
    ];

    protected $casts = [
        'done' => 'boolean',
    ];
}
// Models represent the data structure of an application and provide an interface for interacting with the database. In this code snippet, we define a Task model that has two attributes: 'task' (a string representing the task description) and 'done' (a boolean indicating whether the task is completed). The $fillable property specifies which attributes can be mass-assigned, while the $casts property ensures that the 'done' attribute is treated as a boolean when retrieved from the database.