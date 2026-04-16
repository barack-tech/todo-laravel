<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'user_id',
        'task',
        'done',
    ];

    protected $casts = [
        'done' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
// This is a Laravel Eloquent model for a "Task". It defines the properties that can be mass assigned (user_id, task, done) and casts the 'done' attribute to a boolean. It also defines a relationship indicating that each task belongs to a user.