@extends('layouts.admin')

@section('page-title', 'Users')

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

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100">
            <h2 class="text-base font-semibold text-slate-800">All Users</h2>
            <p class="text-sm text-slate-500 mt-0.5">{{ $users->count() }} total users</p>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-slate-100 bg-slate-50">
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Name</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Email</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Role</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Tasks</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Joined</th>
                        <th class="text-left py-3 px-6 text-slate-500 font-medium">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="border-b border-slate-50 hover:bg-slate-50 transition">
                            <td class="py-4 px-6 text-slate-800 font-medium">
                                <div class="flex items-center gap-3">
                                    <div class="w-7 h-7 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($user->name, 0, 1)) }}
                                    </div>
                                    {{ $user->name }}
                                    @if($user->id === auth()->id())
                                        <span class="text-xs text-indigo-400">(you)</span>
                                    @endif
                                </div>
                            </td>
                            <td class="py-4 px-6 text-slate-500">{{ $user->email }}</td>
                            <td class="py-4 px-6">
                                <span class="px-2.5 py-1 rounded-lg text-xs font-medium {{ $user->isAdmin() ? 'bg-indigo-50 text-indigo-600' : 'bg-slate-100 text-slate-500' }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </td>
                            <td class="py-4 px-6 text-slate-500">{{ $user->tasks_count }}</td>
                            <td class="py-4 px-6 text-slate-500">{{ $user->created_at->diffForHumans() }}</td>
                            <td class="py-4 px-6">
                                @if($user->id !== auth()->id())
                                    <div class="flex items-center gap-2">
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

                                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            
                                            <button
                                             type="submit"
                                            onclick="return confirm('Are you sure you want to delete this user and all their tasks?')"
                                             class="text-xs px-3 py-1.5 rounded-lg bg-red-50 text-red-500 hover:bg-red-100 transition font-medium"
                                            >
                                              Delete
                                            </button>
                                        </form>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="py-8 text-center text-slate-400">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection