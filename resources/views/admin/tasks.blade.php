@extends('layouts.admin')

@section('page-title', 'Tasks')

@section('content')

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-base font-semibold text-slate-800">All Tasks</h2>
            <p class="text-sm text-slate-500 mt-0.5">{{ $tasks->total() }} total tasks</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Task</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Owner</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Status</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Created</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($tasks as $task)
                        <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                            <td class="py-4 px-6 text-slate-800 {{ $task->done ? 'line-through text-slate-400' : 'font-medium' }}">
                                {{ $task->task }}
                            </td>
                            <td class="py-4 px-6">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($task->user->name, 0, 1)) }}
                                    </div>
                                    <span class="text-slate-500">{{ $task->user->name }}</span>
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-medium {{ $task->done ? 'bg-green-50 text-green-600' : 'bg-amber-50 text-amber-600' }}">
                                    {{ $task->done ? 'Done' : 'Active' }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-500">{{ $task->created_at->diffForHumans() }}</td>
                            <td class="py-4 px-6">
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

        {{-- Pagination --}}
        @if($tasks->hasPages())
            <div class="px-6 py-4 border-t border-slate-100">
                {{ $tasks->links() }}
            </div>
        @endif
    </div>

@endsection