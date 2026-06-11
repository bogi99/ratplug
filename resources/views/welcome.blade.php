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
    <div class="flex min-h-screen flex-col items-center justify-center gap-10 px-6 py-12 text-center">
        <div class="space-y-4">
            <h1 class="text-6xl font-bold text-gray-800 text-shadow-blue">The Rat is coming!</h1>
            <p class="text-2xl font-semibold text-slate-900">Soon ™️ <span class="text-blue-900"></span></p>
        </div>

        <div class="w-full max-w-2xl rounded-3xl border border-slate-200/70 bg-white/90 p-8 text-left shadow-2xl shadow-slate-700/10 backdrop-blur">
            <div class="mb-6 space-y-2">
                <h2 class="text-2xl font-semibold text-slate-900">Contact the Rat</h2>
                <p class="text-sm leading-6 text-slate-600">
                    Leave a short message, question, or enquiry below and I'll get back to you as soon as I can.
                </p>
            </div>

            @if (session('status'))
                <div class="mb-5 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">
                    {{ session('status') }}
                </div>
            @endif

            <form action="{{ route('contact.send') }}" method="POST" class="space-y-5">
                @csrf

                <div>
                    <label for="message" class="mb-2 block text-sm font-semibold text-slate-800">
                        Your message
                    </label>
                    <p class="mb-3 text-sm text-slate-600">
                        Use this box to send a contact note, question, or enquiry. The Rat will see.
                    </p>
                    <textarea
                        id="message"
                        name="message"
                        rows="7"
                        required
                        class="w-full rounded-2xl border border-slate-300 bg-slate-50 px-4 py-3 text-base text-slate-900 outline-none transition placeholder:text-slate-400 focus:border-blue-500 focus:bg-white focus:ring-4 focus:ring-blue-200"
                        placeholder="Write your message here...">{{ old('message') }}</textarea>

                    @error('message')
                        <p class="mt-2 text-sm font-medium text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-wrap items-center gap-3 pt-2">
                    <button type="submit" class="inline-flex items-center justify-center rounded-full bg-slate-900 px-6 py-3 text-sm font-semibold text-white transition hover:bg-slate-700">
                        Send
                    </button>
                    <button type="reset" class="inline-flex items-center justify-center rounded-full border border-slate-300 bg-white px-6 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
                        Cancel
                    </button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
