<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} | {{ config('app.env') }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script>window.APP_STATE = {{ \Illuminate\Support\Js::from($appState ?? []) }}</script>
    <style>
        /** Hide unloaded Vue components **/
        [v-cloak] {
            display: none;
        }

        /** Enable lazy-parsing of below-the-fold elements **/
        footer:last-of-page,
        section:not(section:first-of-page) {
            content-visibility: auto;
        }

        /** Enable fade-in-out page transitions **/
        @view-transition {
            navigation: auto;
        }
    </style>

    {{ \Illuminate\Support\Facades\Vite::useBuildDirectory('package-name')
        ->useScriptTagAttributes([
            'defer'=>true
        ])
        ->withEntryPoints([
            'resources/css/app.css',
            'resources/js/app.js'
        ])
    }}
</head>
<body class="antialiased font-sans">
<div id="app" class="relative">
    <div class="flex bg-gray-900 min-h-screen">
        <div class="flex flex-col flex-1">
            <main id="app-content" tabindex="0" class="flex flex-col flex-1 bg-gray-900">
                @yield('header')
                <div class="grow p-3 sm:p-5">
                    @yield('content')
                </div>
                <div class="text-xs text-center p-2 sm:p-3 bg-gray-950">
                    &copy; {{ date('Y') }} Dan Alvidrez - All rights reserved.
                </div>
            </main>
        </div>
    </div>
</div>
</body>
</html>
