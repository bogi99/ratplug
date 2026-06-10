<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>'Rat 1.0'</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
        <style>

        </style>
    @endif
</head>

<body class="bg-slate-400">
    <div class="flex h-screen flex-col items-center justify-center gap-6 text-center">
        <h1 class="text-6xl font-bold text-gray-800 text-shadow-blue">The Rat is coming!</h1>
        <p class="text-2xl font-semibold text-slate-900">Soon ™️ <span
                class="text-blue-900"></span></p>
    </div>

</body>

</html>
