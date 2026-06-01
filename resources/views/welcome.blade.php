<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-gray-900">
        <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-gray-100">
            <header class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex justify-end gap-4">
                <a href="{{ route('login') }}" class="text-sm font-medium text-gray-700 hover:text-gray-900">
                    {{ __('Log in') }}
                </a>
                <a href="{{ route('register') }}" class="inline-flex items-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500">
                    {{ __('Register') }}
                </a>
            </header>

            <main class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 py-16 sm:py-24 text-center">
                <p class="text-sm font-semibold uppercase tracking-wider text-indigo-600 mb-3">
                    {{ __('Exhibition Management') }}
                </p>
                <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">
                    {{ __('Manage museums and exhibitions') }}
                </h1>
                <p class="text-lg text-gray-600 mb-10 leading-relaxed">
                    {{ __('Each exhibition has a title, description, date, and is organized by a museum. Sign in to browse exhibitions, manage museums, and add new shows.') }}
                </p>

                <div class="flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('login') }}" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md bg-indigo-600 px-8 py-3 text-sm font-semibold text-white shadow hover:bg-indigo-500">
                        {{ __('Log in') }}
                    </a>
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex justify-center items-center rounded-md border border-gray-300 bg-white px-8 py-3 text-sm font-semibold text-gray-700 shadow-sm hover:bg-gray-50">
                        {{ __('Create account') }}
                    </a>
                </div>

                <ul class="mt-16 grid gap-6 sm:grid-cols-3 text-left">
                    <li class="rounded-lg bg-white p-6 shadow-sm border border-gray-100">
                        <h2 class="font-semibold text-gray-900 mb-2">{{ __('Exhibitions') }}</h2>
                        <p class="text-sm text-gray-600">{{ __('Title, description, and date for every show.') }}</p>
                    </li>
                    <li class="rounded-lg bg-white p-6 shadow-sm border border-gray-100">
                        <h2 class="font-semibold text-gray-900 mb-2">{{ __('Museums') }}</h2>
                        <p class="text-sm text-gray-600">{{ __('Each exhibition is linked to the museum that hosts it.') }}</p>
                    </li>
                    <li class="rounded-lg bg-white p-6 shadow-sm border border-gray-100">
                        <h2 class="font-semibold text-gray-900 mb-2">{{ __('Secure access') }}</h2>
                        <p class="text-sm text-gray-600">{{ __('Only signed-in users can view and manage the catalog.') }}</p>
                    </li>
                </ul>
            </main>
        </div>
    </body>
</html>
