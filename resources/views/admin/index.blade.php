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
