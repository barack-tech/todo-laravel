@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
            {{ session('error') }}
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-3 gap-6 mb-8">
        <a href="{{ route('admin.users') }}" class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition">
            <p class="text-3xl font-bold text-indigo-600">{{ $totalUsers }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Users</p>
            <p class="text-xs text-indigo-400 mt-3">View all →</p>
        </a>

        <a href="{{ route('admin.tasks') }}" class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-md hover:border-indigo-100 transition">
            <p class="text-3xl font-bold text-indigo-600">{{ $totalTasks }}</p>
            <p class="text-sm text-slate-500 mt-1">Total Tasks</p>
            <p class="text-xs text-indigo-400 mt-3">View all →</p>
        </a>

        <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
            <p class="text-3xl font-bold text-indigo-600">{{ $completedTasks }}</p>
            <p class="text-sm text-slate-500 mt-1">Completed Tasks</p>
            <p class="text-xs text-slate-400 mt-3">{{ $totalTasks > 0 ? round(($completedTasks / $totalTasks) * 100) : 0 }}% completion rate</p>
        </div>
    </div>

    {{-- Quick Overview --}}
    <div class="grid grid-cols-2 gap-6">

        {{-- Recent Users --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-slate-800">Recent Users</h2>
                <a href="{{ route('admin.users') }}" class="text-xs text-indigo-500 hover:text-indigo-700 transition">View all</a>
            </div>
            <ul class="divide-y divide-slate-50">
                @foreach($users->take(5) as $user)
                    <li class="px-6 py-3 flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <div class="w-7 h-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs">
                                {{ strtoupper(substr($user->name, 0, 1)) }}
                            </div>
                            <div>
                                <p class="text-sm font-medium text-slate-700">{{ $user->name }}</p>
                                <p class="text-xs text-slate-400">{{ $user->tasks_count }} tasks</p>
                            </div>
                        </div>
                        <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $user->isAdmin() ? 'bg-indigo-50 text-indigo-600' : 'bg-slate-100 text-slate-500' }}">
                            {{ ucfirst($user->role) }}
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- Recent Tasks --}}
        <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h2 class="text-sm font-semibold text-slate-800">Recent Tasks</h2>
                <a href="{{ route('admin.tasks') }}" class="text-xs text-indigo-500 hover:text-indigo-700 transition">View all</a>
            </div>
            <ul class="divide-y divide-slate-50">
                @foreach($tasks->take(5) as $task)
                    <li class="px-6 py-3 flex items-center justify-between gap-4">
                        <p class="text-sm text-slate-700 truncate {{ $task->done ? 'line-through text-slate-400' : '' }}">
                            {{ $task->task }}
                        </p>
                        <span class="text-xs text-slate-400 shrink-0">{{ $task->user->name }}</span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection
<!-- @extends('layouts.admin')

@section('page-title', 'Dashboard')
@section('content')
    <div class="space-y-6">

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-slate-800">Admin Dashboard</h1>
                    <p class="text-slate-500 mt-1 text-sm">Manage users and tasks across Taskflow.</p>
                </div>
                <a href="{{ route('tasks.index') }}" class="text-sm text-indigo-600 hover:text-indigo-700 font-medium transition">
                    ← Back to Tasks
                </a>
            </div>

            {{-- Stats --}}
            <div class="grid grid-cols-3 gap-4 mt-6">
                <div class="bg-slate-50 rounded-xl p-4 text-center border border-slate-100">
                    <p class="text-2xl font-bold text-indigo-600">{{ $totalUsers }}</p>
                    <p class="text-xs text-slate-500 mt-1">Total Users</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-4 text-center border border-slate-100">
                    <p class="text-2xl font-bold text-indigo-600">{{ $totalTasks }}</p>
                    <p class="text-xs text-slate-500 mt-1">Total Tasks</p>
                </div>
                <div class="bg-slate-50 rounded-xl p-4 text-center border border-slate-100">
                    <p class="text-2xl font-bold text-indigo-600">{{ $completedTasks }}</p>
                    <p class="text-xs text-slate-500 mt-1">Completed Tasks</p>
                </div>
            </div>
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
                {{ session('error') }}
            </div>
        @endif

        {{-- Users Table --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-6">Users</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Name</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Email</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Role</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Tasks</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                                <td class="py-3 px-4 text-slate-800 font-medium">
                                    {{ $user->name }}
                                    @if($user->id === auth()->id())
                                        <span class="text-xs text-indigo-400 ml-1">(you)</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 text-slate-500">{{ $user->email }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $user->isAdmin() ? 'bg-indigo-50 text-indigo-600' : 'bg-slate-100 text-slate-500' }}">
                                        {{ ucfirst($user->role) }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-slate-500">{{ $user->tasks_count }}</td>
                                <td class="py-3 px-4">
                                    <div class="flex items-center gap-2">
                                        @if($user->id !== auth()->id())
                                            {{-- Promote / Demote --}}
                                            @if($user->isUser())
                                                <form action="{{ route('admin.users.promote', $user) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-indigo-50 text-indigo-600 hover:bg-indigo-100 transition font-medium">
                                                        Promote
                                                    </button>
                                                </form>
                                            @else
                                                <form action="{{ route('admin.users.demote', $user) }}" method="POST">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-slate-100 text-slate-600 hover:bg-slate-200 transition font-medium">
                                                        Demote
                                                    </button>
                                                </form>
                                            @endif

                                            {{-- Delete User --}}
                                            <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 transition font-medium">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400">No users found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Tasks Table --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">
            <h2 class="text-xl font-bold text-slate-800 mb-6">All Tasks</h2>

            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-slate-100">
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Task</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Owner</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Status</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Created</th>
                            <th class="text-left py-3 px-4 text-slate-500 font-medium">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($tasks as $task)
                            <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                                <td class="py-3 px-4 text-slate-800 {{ $task->done ? 'line-through text-slate-400' : '' }}">
                                    {{ $task->task }}
                                </td>
                                <td class="py-3 px-4 text-slate-500">{{ $task->user->name }}</td>
                                <td class="py-3 px-4">
                                    <span class="px-2 py-1 rounded-lg text-xs font-medium {{ $task->done ? 'bg-green-50 text-green-600' : 'bg-amber-50 text-amber-600' }}">
                                        {{ $task->done ? 'Done' : 'Active' }}
                                    </span>
                                </td>
                                <td class="py-3 px-4 text-slate-500">{{ $task->created_at->diffForHumans() }}</td>
                                <td class="py-3 px-4">
                                    <form action="{{ route('admin.tasks.destroy', $task) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 transition font-medium">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="py-8 text-center text-slate-400">No tasks found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection -->

