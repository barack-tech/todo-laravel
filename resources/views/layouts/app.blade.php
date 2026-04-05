<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 to-indigo-50 font-sans">
    <main class="max-w-2xl mx-auto px-4 py-12">
        @yield('content')
    </main>
</body>
</html>