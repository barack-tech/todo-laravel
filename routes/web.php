<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/{filter?}', [TaskController::class, 'index'])->name('tasks.index');
Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::patch('/tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::patch('/tasks/{task}/toggle', [TaskController::class, 'toggle'])->name('tasks.toggle');
Route::delete('/tasks/{task}', [TaskController::class, 'destroy'])->name('tasks.destroy');
// Routes are the entry point to an application, defining how requests are handled and which controller methods are invoked. In this code snippet, we define routes for a task management application, allowing users to view, create, update, toggle, and delete tasks. Each route is associated with a specific HTTP method and a controller action that processes the request and returns a response.