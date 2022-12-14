<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @isset($title)
            {{ $title }} | 
        @endisset
        {{ config('app.name', 'Laravel') }}
    </title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('mix/css/app.css') }}">
    @livewireStyles

    <!-- Scripts -->
    <wireui:scripts />
    <script src="{{ mix('mix/js/app.js') }}" defer></script>
    {{-- Push ApexCharts to the top of the scripts stack --}}
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    
    @include("layouts.partials.google-analytics-header")
</head>
<body>
    @include("layouts.partials.google-analytics-body")
    <div class="overflow-hidden">
        <header>
            <x-customers.navi />
        </header>

        <main>
            {{ $slot }}
        </main>

        <x-footer/>
    </div>

    @livewireScripts
    @stack('scripts')
    <x-notifications />
</body>
</html>
