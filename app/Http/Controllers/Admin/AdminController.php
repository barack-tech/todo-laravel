<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::withCount('tasks')->latest()->get();
        $tasks = Task::with('user')->latest()->get();
        $totalUsers = $users->count();
        $totalTasks = $tasks->count();
        $completedTasks = $tasks->where('done', true)->count();

        return view('admin.index', compact(
            'users',
            'tasks',
            'totalUsers',
            'totalTasks',
            'completedTasks'
        ));
    }

    public function promote(User $user)
    {
        $user->update(['role' => 'admin']);

        return redirect()->route('admin.index')
            ->with('success', "{$user->name} has been promoted to admin.");
    }

    public function demote(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.index')
                ->with('error', 'You cannot demote yourself.');
        }

        $user->update(['role' => 'user']);

        return redirect()->route('admin.index')
            ->with('success', "{$user->name} has been demoted to user.");
    }

    public function destroyUser(User $user)
    {
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.index')
                ->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('admin.index')
            ->with('success', 'User deleted successfully.');
    }

    public function destroyTask(Task $task)
    {
        $task->delete();

        return redirect()->route('admin.index')
            ->with('success', 'Task deleted successfully.');
    }
}