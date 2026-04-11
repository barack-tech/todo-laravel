@extends('layouts.app')

@section('content')
    <div class="bg-white rounded-2xl shadow-xl p-8">

        {{-- Header --}}
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold text-slate-800">Task Manager </h1>
                <p class="text-slate-500 mt-1">Keep your day organized and focused.</p>
            </div>
            <div class="text-right">
                <span class="text-2xl font-bold text-indigo-600">{{ $completed }}/{{ $total }}</span>
                <p class="text-slate-400 text-xs mt-0.5">completed</p>
            </div>
        </div>

        {{-- Filter Tabs --}}
        <div class="flex gap-2 mb-6">
            @foreach(['all' => 'All', 'active' => 'Active', 'completed' => 'Completed'] as $key => $label)
                
                  <a  href="{{ route('tasks.index', $key === 'all' ? [] : ['filter' => $key]) }}"
                    class="px-4 py-2 rounded-xl text-sm font-medium transition
                        {{ $filter === $key
                            ? 'bg-indigo-600 text-white shadow-md'
                            : 'bg-slate-100 text-slate-500 hover:bg-slate-200' }}"
                >
                    {{ $label }}
                </a>
            @endforeach
        </div>

        {{-- Flash Messages --}}
        @if(session('success'))
            <div class="mb-6 px-4 py-3 bg-green-50 border border-green-200 text-green-700 rounded-xl text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 px-4 py-3 bg-red-50 border border-red-200 text-red-700 rounded-xl text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        {{-- Add Task Form --}}
        <form action="{{ route('tasks.store') }}" method="POST" class="flex gap-3 mb-8">
            @csrf
            <input
                type="text"
                name="task"
                placeholder="Add a new task..."
                autocomplete="off"
                maxlength="255"
                value="{{ old('task') }}"
                class="flex-1 border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
            >
            <button
                type="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-3 rounded-xl text-sm transition shadow-md hover:shadow-lg"
            >
                Add
            </button>
        </form>

        {{-- Task List --}}
        <ul class="space-y-3">
            @forelse($tasks as $task)
                <li class="flex items-center justify-between gap-4 border border-slate-100 rounded-xl px-4 py-3 hover:border-slate-300 hover:shadow-sm transition {{ $task->done ? 'bg-slate-50' : 'bg-white' }}">

                    {{-- Toggle + Text / Edit Form --}}
                    <div class="flex items-center gap-3 flex-1 min-w-0">

                        {{-- Toggle Checkbox --}}
                        <form action="{{ route('tasks.toggle', $task) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input
                                type="checkbox"
                                onchange="this.form.submit()"
                                {{ $task->done ? 'checked' : '' }}
                                class="w-4 h-4 accent-indigo-600 cursor-pointer"
                            >
                        </form>

                        {{-- Task Text --}}
                        <span class="task-text text-sm {{ $task->done ? 'line-through text-slate-400' : 'text-slate-700' }}">
                            {{ $task->task }}
                        </span>

                        {{-- Inline Edit Form --}}
                        <form
                            action="{{ route('tasks.update', $task) }}"
                            method="POST"
                            class="edit-form hidden items-center gap-2 flex-1"
                        >
                            @csrf
                            @method('PATCH')
                            <input
                                type="text"
                                name="task"
                                value="{{ $task->task }}"
                                maxlength="255"
                                required
                                class="flex-1 border border-slate-300 rounded-lg px-3 py-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400"
                            >
                            <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-semibold px-3 py-1.5 rounded-lg transition">
                                Save
                            </button>
                            <button type="button" class="cancel-btn border border-slate-300 text-slate-500 hover:text-slate-700 text-xs px-3 py-1.5 rounded-lg transition">
                                Cancel
                            </button>
                        </form>
                    </div>

                    {{-- Actions --}}
                    <div class="flex items-center gap-2 shrink-0">
                        {{-- Edit Button --}}
                        <button
                            class="edit-btn w-8 h-8 flex items-center justify-center rounded-lg bg-indigo-50 hover:bg-indigo-100 text-indigo-500 transition"
                            aria-label="Edit task"
                        >
                            ✎
                        </button>

                        {{-- Delete Button --}}
                        <form action="{{ route('tasks.destroy', $task) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                class="w-8 h-8 flex items-center justify-center rounded-lg bg-red-50 hover:bg-red-100 text-red-400 hover:text-red-600 transition text-lg"
                                aria-label="Delete task"
                            >
                                ×
                            </button>
                        </form>
                    </div>
                </li>
            @empty
                <li class="text-center text-slate-400 text-sm py-8">
                    @if($filter === 'active')
                        No active tasks. Well done!
                    @elseif($filter === 'completed')
                        No completed tasks yet.
                    @else
                        No tasks yet. Add your first one above.
                    @endif
                </li>
            @endforelse
        
        </ul>

            {{-- Pagination --}}
            @if($tasks->hasPages())
                <div class="mt-6">
                    {{ $tasks->appends(['filter' => $filter])->links() }}
                </div>
            @endif
    </div>

    {{-- Inline Edit Script --}}
    <script>
        document.querySelectorAll('li').forEach(item => {
            const editBtn   = item.querySelector('.edit-btn');
            const cancelBtn = item.querySelector('.cancel-btn');
            const taskText  = item.querySelector('.task-text');
            const editForm  = item.querySelector('.edit-form');

            if (!editBtn || !editForm) return;

            editBtn.addEventListener('click', () => {
                taskText.classList.add('hidden');
                editForm.classList.remove('hidden');
                editForm.classList.add('flex');
                editBtn.classList.add('hidden');
                editForm.querySelector('input[type="text"]').focus();
            });

            cancelBtn.addEventListener('click', () => {
                taskText.classList.remove('hidden');
                editForm.classList.add('hidden');
                editForm.classList.remove('flex');
                editBtn.classList.remove('hidden');
            });
        });
    </script>
@endsection