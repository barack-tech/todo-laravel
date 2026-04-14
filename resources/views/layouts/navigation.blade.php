<nav x-data="{ open: false }" class="bg-white border-b border-slate-200 shadow-sm">

    <!-- Primary Navigation -->
    <div class="max-w-2xl mx-auto px-4">
        <div class="flex justify-between h-14">

            <!-- Logo / App Name -->
            <div class="flex items-center">
                <a href="{{ route('tasks.index') }}" class="text-indigo-600 font-bold text-lg tracking-tight">
                    TASKLY
                </a>
            </div>

            <!-- Desktop Right Side -->
            <div class="hidden sm:flex sm:items-center gap-4">
                <span class="text-sm text-slate-500">{{ Auth::user()->name }}</span>

                <a href="{{ route('profile.edit') }}" class="text-sm text-slate-500 hover:text-slate-700 transition">
                    Profile
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-slate-500 hover:text-red-500 transition">
                        Log Out
                    </button>
                </form>
            </div>

            <!-- Hamburger -->
            <div class="flex items-center sm:hidden">
                <button @click="open = !open" class="p-2 rounded-lg text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition">
                    <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': !open}" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': !open, 'inline-flex': open}" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div :class="{'block': open, 'hidden': !open}" class="hidden sm:hidden border-t border-slate-100">
        <div class="max-w-2xl mx-auto px-4 py-3 space-y-1">
            <div class="text-sm font-medium text-slate-800">{{ Auth::user()->name }}</div>
            <div class="text-sm text-slate-500">{{ Auth::user()->email }}</div>
        </div>

        <div class="max-w-2xl mx-auto px-4 pb-3 space-y-1 border-t border-slate-100 pt-3">
            <a href="{{ route('profile.edit') }}" class="block text-sm text-slate-600 hover:text-slate-800 py-1 transition">
                Profile
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="block text-sm text-slate-600 hover:text-red-500 py-1 transition">
                    Log Out
                </button>
            </form>
        </div>
    </div>
</nav>