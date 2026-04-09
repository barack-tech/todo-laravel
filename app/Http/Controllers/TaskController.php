<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class TaskController extends Controller
{
        use AuthorizesRequests;
    public function index(string $filter = 'all')
    {
        $allTasks  = Auth::user()->tasks()->latest()->get();
        $total     = $allTasks->count();
        $completed = $allTasks->where('done', true)->count();

        $tasks = match($filter) {
            'active'    => $allTasks->where('done', false)->values(),
            'completed' => $allTasks->where('done', true)->values(),
            default     => $allTasks,
        };

        return view('tasks.index', compact('tasks', 'total', 'completed', 'filter'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        Auth::user()->tasks()->create($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task added successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $this->authorize('update', $task);

        $validated = $request->validate([
            'task' => 'required|string|max:255',
        ]);

        $task->update($validated);

        return redirect()->route('tasks.index')
            ->with('success', 'Task updated successfully.');
    }

    public function toggle(Task $task)
    {
        $this->authorize('update', $task);

        $task->update(['done' => !$task->done]);

        return redirect()->route('tasks.index')
            ->with('success', 'Task status updated.');
    }

    public function destroy(Task $task)
    {
        $this->authorize('delete', $task);

        $task->delete();

        return redirect()->route('tasks.index')
            ->with('success', 'Task deleted successfully.');
    }
}