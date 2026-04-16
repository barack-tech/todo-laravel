<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register — {{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-50 font-sans flex items-center justify-center px-4">

    <div class="w-full max-w-md">

        {{-- Logo / App Name --}}
        <div class="text-center mb-8">
            <a href="/" class="text-2xl font-bold text-indigo-600 tracking-tight">
                Laravel Todo
            </a>
            <p class="text-slate-500 text-sm mt-1">Create an account to get started.</p>
        </div>

        {{-- Card --}}
        <div class="bg-white rounded-2xl shadow-xl p-8">

            <form method="POST" action="{{ route('register') }}">
                @csrf

                {{-- Name --}}
                <div class="mb-5">
                    <label for="name" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Name
                    </label>
                    <input
                        id="name"
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        required
                        autofocus
                        autocomplete="name"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    >
                    @error('name')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div class="mb-5">
                    <label for="email" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Email
                    </label>
                    <input
                        id="email"
                        type="email"
                        name="email"
                        value="{{ old('email') }}"
                        required
                        autocomplete="username"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div class="mb-5">
                    <label for="password" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        name="password"
                        required
                        autocomplete="new-password"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    >
                    @error('password')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Confirm Password --}}
                <div class="mb-6">
                    <label for="password_confirmation" class="block text-sm font-medium text-slate-700 mb-1.5">
                        Confirm Password
                    </label>
                    <input
                        id="password_confirmation"
                        type="password"
                        name="password_confirmation"
                        required
                        autocomplete="new-password"
                        class="w-full border border-slate-200 rounded-xl px-4 py-3 text-sm text-slate-800 bg-slate-50 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition"
                    >
                    @error('password_confirmation')
                        <p class="mt-1.5 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Submit --}}
                <button
                    type="submit"
                    class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-3 rounded-xl text-sm transition shadow-md hover:shadow-lg"
                >
                    Create Account
                </button>
            </form>
        </div>

        {{-- Login Link --}}
        <p class="text-center text-sm text-slate-500 mt-6">
            Already have an account?
            <a href="{{ route('login') }}" class="text-indigo-600 hover:text-indigo-700 font-medium transition">
                Sign in
            </a>
        </p>
    </div>

</body>
</html>