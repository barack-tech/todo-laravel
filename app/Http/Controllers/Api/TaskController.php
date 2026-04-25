<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        $tasks = $request->user()->tasks()->latest()->get();

        return response()->json([
            'success' => true,
            'data'    => $tasks,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $task = $request->user()->tasks()->create($validated);

        return response()->json([
            'success' => true,
            'data'    => $task,
        ], 201);
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $task->update($validated);

        return response()->json([
            'success' => true,
            'data'    => $task,
        ]);
    }

    public function toggle(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $task->update(['done' => !$task->done]);

        return response()->json([
            'success' => true,
            'data'    => $task,
        ]);
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return response()->json([
            'success' => true,
            'message' => 'Task deleted successfully.',
        ]);
    }
}